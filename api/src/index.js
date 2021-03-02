const express = require('express');
const mysql = require('mysql');

const app = express();


const connection = mysql.createConnection({
    // host:'172.17.0.2', // ip do container do mysql
    host:'mysql-container', // passado pela flag --link do comando docker
    user:'root',
    password:'teste',
    database: 'bancoteste'
});

connection.connect();

app.get('/products', function(req, res){
    connection.query('SELECT * FROM products', function(error, results){
        if(error){
            throw error;
        }

        res.send(results.map(function(item){
            return { name: item.name, price: item.price };
        }));
    })
})

app.listen(8091, function(){
    console.log('server listening on port 8091');
});