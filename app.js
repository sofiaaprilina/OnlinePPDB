const { Client } = require('whatsapp-web.js');
const express = require('express');
const { body, validationResult } = require('express-validator');
const socketIO = require('socket.io');
const qrcode = require('qrcode');
const http = require('http');
const fs = require('fs');
const { phoneNumberFormatter } = require('./helpers/formatter');

const app = express();
const server = http.createServer(app);
const io = socketIO(server);
try{
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

const SESSION_FILE_PATH = './whatsapp-session.json';
let sessionCfg;
if (fs.existsSync(SESSION_FILE_PATH)) {
    sessionCfg = require(SESSION_FILE_PATH);
}

app.get('/wa', (req, res) => {
    res.sendFile('wa.html', {root: __dirname});
});


const client = new Client({
    restartOnAuthFail: true,
    puppeteer: {
      headless: true,
      args: [
        '--no-sandbox',
        '--disable-setuid-sandbox',
        '--disable-dev-shm-usage',
        '--disable-accelerated-2d-canvas',
        '--no-first-run',
        '--no-zygote',
        '--single-process', // <- this one doesn't works in Windows
        '--disable-gpu'
      ],
    },
    qrTimeoutMs: 0,
    session: sessionCfg,
    timeout: 0
  });

client.on('message', msg => {
    if (msg.body == '!ping') {
        msg.reply('pong');
    }
});

client.initialize();

//socket IO
io.on('connection', function(socket) {
    socket.emit('message', 'Connecting...');
  
    client.on('qr', (qr) => {
        console.log('QR RECEIVED', qr);
        qrcode.toDataURL(qr, (err, url) => {
            socket.emit('qr', url);
            socket.emit('message', 'QR Code received, scan please!');
        });
    });
  
    client.on('ready', () => {
        socket.emit('ready', 'Whatsapp is ready!');
        socket.emit('message', 'Whatsapp is ready!');
    });
  
    client.on('authenticated', (session) => {
        socket.emit('authenticated', 'Whatsapp is authenticated!');
        socket.emit('message', 'Whatsapp is authenticated!');
        console.log('AUTHENTICATED', session);
        sessionCfg = session;
        fs.writeFile(SESSION_FILE_PATH, JSON.stringify(session), function(err) {
            if (err) {
                console.error(err);
            }
        });
    });
  
    client.on('auth_failure', function(session) {
        socket.emit('message', 'Auth failure, restarting...');
    });
  
    client.on('disconnected', async (reason) => {
        socket.emit('message', 'Whatsapp is disconnected!');
        fs.unlinkSync(SESSION_FILE_PATH, function(err) {
            if(err) return console.log(err);
            console.log('Session file deleted!');
        });
        client.destroy();
        try {
         await client.initialize();
    } catch (error) {
        console.log('That did not go well.')
      }
    });
});

// Send message
app.post('/send-message', [
    body('number').notEmpty(),
    body('message').notEmpty(),
], (req, res) => {
    const errors = validationResult(req).formatWith(({ msg }) => {
        return msg;
    });

    if (!errors.isEmpty()) {
        return res.status(422).json({
            status: false,
            message: errors.mapped()
        })
    }

    const number = phoneNumberFormatter(req.body.number);
    const message = req.body.message;

    client.sendMessage(number, message).then(response => {
        res.status(200).json({
            status: true,
            response: response
        });
    }).catch(err => {
        res.status(500).json({
            status: false,
            response: err
        });
    });
});

server.listen(8000, function(){
    console.log('App running on *:' + 8000);
})
}
catch (err) {
    next(err);
  }