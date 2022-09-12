const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");
const app = express();

const PORT = 3000;

const unlock = (password) => {
    return (
        password.length === 4 &&
        8 * Math.pow(password.charCodeAt(0), 2) +
            2 * Math.pow(password.charCodeAt(1), 4) -
            3 * Math.pow(password.charCodeAt(2), 3) +
            Math.pow(password.charCodeAt(3), 2) ===
            3849056 &&
        /^[F-Ht-v1-3@&*]+$/g.test(password)
    );
};

app.use(bodyParser.urlencoded({ extended: false }));

app.get("/", (_, res) => {
    res.sendFile("index.html", { root: __dirname });
});

app.get("/robots.txt", (_, res) => {
    res.write("Disallow: /app");
    res.end();
});

app.get("/app", (_, res) => {
    const app = fs.readFileSync("./app.js");
    res.write(app);
    res.end();
});

app.post("/login", async (req, res) => {
    const password = req.body.password;
    const path = req.body.path;

    await new Promise((resolve) => setTimeout(resolve, 1000)); // Prevent bruteforce

    try {
        if (!unlock(password)) {
            res.status(301).redirect("/");
            res.end();
            return;
        }

        if (path === undefined) {
            res.write("Successfully logged in!");
            res.end();
            return;
        }

        if (!fs.existsSync(path)) {
            res.status(400).write("Path does not exist!");
            res.end();
            return;
        }

        if (fs.statSync(path).isDirectory()) res.write(JSON.stringify(fs.readdirSync(path)));
        else res.write(fs.readFileSync(path));

        res.end();
    } catch (err) {
        console.log(err);
        res.write("Something went wrong");
        res.end();
    }
});

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
