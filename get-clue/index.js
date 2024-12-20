const express = require('express');
const app = express();
const port = 3000;


app.get('/', (req, res) => {
  res.send('Welcome to CTF challenge! Find the flag!');
});

app.get('/flag', (req, res) => {

    if (req.headers['x-du'] === 'ctf' ) {
        if (req.query['password'] === 'rahasiailahi') {
            res.send(`ini flag nya: ${process.env.FLAG}`);
        }
    } 

    res.send('DCTF{tapi_boong}');
});

app.listen(port, () => {
  console.log(`Challenge server is running at http://localhost:${port}`);
});
