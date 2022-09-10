const express = require("express");
const bodyParser = require("body-parser");
const app = express();

const PORT = 8080;

const FLAG = "FLAG{0bv10u5ly_d0_n07_u53_cl13n7_51d3_v4l1d4710n}";
const WIN = `/root/authorized_keys\n\n${FLAG}`

app.use(bodyParser.urlencoded({ extended: false }));

app.get("/", (req, res) => {
    res.sendFile("index.html", { root: __dirname });
});

app.post("/login", (req, res) => {
    const password = req.body.password;

    await new Promise((resolve) => setTimeout(resolve, 500)); // Prevent bruteforce

    if (password === "G&2t") {
        res.write(WIN);
    } else {
        res.status(301).redirect("/");
    }
    res.end();
});

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
