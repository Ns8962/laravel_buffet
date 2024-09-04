const express = require('express');
const app = express();
const { v4 : uuidv4 }  = require('uuid');
const port = process.env.port || 3030;
let mysql = require('mysql');
const { socket } = require('server/router');
let connection = mysql.createConnection({
    host : 'localhost',
    user : 'root',
    password  :'',
    database : 'laravel_buffet'
});

const server = app.listen(`${port}`, ()=>{

    console.log(`sever =>  ${port}`);

    connection.connect();
});

const io  = require("socket.io")(server, {
        cors : { origin : "*" }
});

io.on('connection', (socket)=> {
    console.log('cliant connect!');
    socket.on('disconnect', () =>{
        console.log('Cliant disconnrcted!');
    })
});