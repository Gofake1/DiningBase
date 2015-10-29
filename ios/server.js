var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var app = express();
var router = express.Router();
var port = 7777;

app.use(bodyParser.json());
app.use('/api', router);

router.get('/', function(req, res) {
    res.json({ message: 'GET successful, hello' });
});

app.listen(port);