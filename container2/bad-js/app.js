const express = require("express");
const bodyParser = require("body-parser");
const app = express();

const PORT = 8080;

const WIN = `File: /root/.ssh/authorized_keys
# If you're trying to find the private keys on the system, don't bother, it's not here. Or is it...? It's not.
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAH6kT9M1xXl6QSVH2TqGH7dzH3Mi1RwNl7c7axZdTuOARGWBM1Zbo6RfpxV9CUdvrFD5cz1rJUM0HIuqX+uNL4cmnuXJf/B7bfrtetBuAHd35oSlpQrgI55aHPcU0yqC+rM6etji6B2vX2ZjnIqqjsUEzk+Nf0JOnJ4T5MjusPTy8n+C41GxbzhCrahYrIAw4uvjCZSdyerI2QxCRvOJHp8ubJBIqrxtsGJS3bIPbq+bfNklYblkekVzhFVPysvekDJKKzo1s81liRxfjxwMvT6tu9lj7mLr9GVBxu0pd7Yb+s/Je3WuD0eOnt3nGHvwZ/aCACXkVlp+W7zLiFMI3I0= someuser@somecomputer
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCDQWAdr0k/BmPtCbGfA95X4vwXGYc4LjxProZfyxwTWReHf8DT1SgF74zeDN2i50D8xlFBitX9XeIOknFZINgZOKy/EpErRWJghYnx9gJ6lO0OSIBDgoix/D+g/1f88JvZ93z6+HbEwYvm7opNgPM6yxEjMrtazby3y+yrE7UZJLWwxEm924LtBhq/ngWHVUtiHyUgvrha4d+/DJDhOqJH4wlYldTp0nNMPB9/u/rie2IzzxAf5mK8h5f0kaia0ZWLUdHCanYhBXJQ7wDGwNyn4DNfzxW/Vv1KWgLKnvK1Ld1hXtH5F4C3GM2OGDKOJucmrEKMStbeHtjhGnAcpNcj someotheruser@somecomputer

Congratulations on solving part 3/6! Here's your flag!
FLAG{0bv10u5ly_d0_n07_u53_cl13n7_51d3_v4l1d4710n}`;

app.use(bodyParser.urlencoded({ extended: false }));

app.get("/", (req, res) => {
    res.sendFile("index.html", { root: __dirname });
});

app.post("/login", async (req, res) => {
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
