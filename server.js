var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var app = express();
var router = express.Router();
var port = 7777;

app.use(bodyParser.json());

router.get('/', function(req, res) {
    res.json({ message: 'GET successful, hello' });
});

app.use('/api', router);
app.listen(port);
console.log('Listening on port '+port);
