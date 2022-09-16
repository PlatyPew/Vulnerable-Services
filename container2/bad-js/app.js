const express = require("express");
const bodyParser = require("body-parser");
const fs = require("fs");
const app = express();

const PORT = 3000;

const unlock = (password) => {
    return (
        password.length == 8 &&
        password.charCodeAt(0) == 71 &&
        password.charCodeAt(1) == 38 &&
        password.charCodeAt(2) * password.charCodeAt(3) === 5800 &&
        password.charCodeAt(2) - password.charCodeAt(3) === -66 &&
        password.charCodeAt(0) +
            password.charCodeAt(1) +
            password.charCodeAt(2) +
            password.charCodeAt(3) +
            password.charCodeAt(4) +
            password.charCodeAt(5) +
            password.charCodeAt(6) +
            password.charCodeAt(7) ===
            576 &&
        password.charCodeAt(0) +
            2 * password.charCodeAt(1) +
            3 * password.charCodeAt(2) +
            4 * password.charCodeAt(3) +
            5 * password.charCodeAt(4) +
            6 * password.charCodeAt(5) +
            7 * password.charCodeAt(6) +
            8 * password.charCodeAt(7) ===
            2685 &&
        password.charCodeAt(0) -
            password.charCodeAt(1) -
            password.charCodeAt(2) -
            password.charCodeAt(3) -
            password.charCodeAt(4) -
            password.charCodeAt(5) -
            password.charCodeAt(6) -
            password.charCodeAt(7) ===
            -434 &&
        8 * Math.pow(password.charCodeAt(0), 2) +
            2 * Math.pow(password.charCodeAt(1), 4) -
            3 * Math.pow(password.charCodeAt(2), 3) +
            Math.pow(password.charCodeAt(3), 2) +
            74 * Math.pow(password.charCodeAt(4), 2) -
            9 * Math.pow(password.charCodeAt(5), 3) +
            7 * Math.pow(password.charCodeAt(6), 4) -
            Math.pow(password.charCodeAt(7), 2) ===
            648891911
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
