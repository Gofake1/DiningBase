var express = require('express');
var bodyParser = require('body-parser');
var mysql = require('mysql');
var app = express();
var router = express.Router();
var port = 7777;

var connection = mysql.createConnection({
    host:     'localhost',
    user:     'smike',
    password: 'balloon',
    database: 'smike'
});
connection.connect();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.set('view engine', 'jade');

router.get('/', function(req, res) {
    res.json({ message: 'GET successful, hello' });
});

router.route('/users')
    // Get all users
    .get(function(req, res) {
        var query = connection.query('SELECT * FROM User', function(err, results) {
            if (err)
                res.json({ error: err });
            else
                res.json({ message: 'success', results: results });
        });
        console.log(query.sql);
    })

    // Add a new user
    .post(function(req, res) {
        console.log(req.body);
        var user = {
            firstName: req.body.firstName,
            lastName:  req.body.lastName,
            netid:     req.body.netid,
            email:     req.body.email,
            password:  req.body.password
        };
        var query = connection.query('INSERT INTO User SET ?', user, function(err, result) {
            if (err)
                res.json({ error: err });
            else
                res.json({ message: 'success' });
        });
        console.log(query.sql);
    });

router.route('/users/:netid')
    // Get a user
    .get(function(req, res) {
        
    })

    .put(function(req, res) {
        
    });

router.route('/reviews')
    // Get all reviews
    .get(function(req, res) {
        var query = connection.query('SELECT * FROM Review', function(err, results) {
            if (err)
                res.json({ error: err });
            else
                res.json({ message: 'success', results: results });
        });
    });

router.route('/reviews/:name')
    // Get all reviews for a food item
    .get(function(req, res) {

    })

    // Update a review
    .put()

    // Add a new review
    .post(function(req, res) {

    });

// Present today's menu
app.get('/today', function(req, res) {
    res.render('today', { user: 'Spencer', message: 'Hello world' });
});

// Present user's profile
app.get('/user', function(req, res) {
    res.render('user', {});
});

// Present user's reviews
app.get('/reviews', function(req, res) {
    res.render('reviews', {});
});

app.use('/api', router);
app.listen(port);
console.log('Listening on port '+port);