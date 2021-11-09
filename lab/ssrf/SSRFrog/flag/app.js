const express = require("express");
const { FLAG } = require("./secret");

const flagApp = express();
flagApp.get('/', (req, res) => {
    if (req.hostname === 'the.c0o0o0l-fl444g.server.internal')
        return res.send(FLAG);
    else
        return res.send('only accept the.c0o0o0l-fl444g.server.internal');
});
flagApp.listen(80, 'the.c0o0o0l-fl444g.server.internal');