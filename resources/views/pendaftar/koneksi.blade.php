@extends('layouts.main')

@section('title', 'Koneksi WA')

 @section('content')
    
     <div class="card shadow">
        <div class="card-body">
            <div class="table">
                <div id="app">
                <div class="container">
                    <div class="row mt-3">
                      <div class="col text-center">
                        <h3>Login to WhatsApp</h3>
                        <img class="img-fluid" src="https://cdn.contentfun.net/files/upload/content/322052eb1cab393f4d7e2f37077d78ea.png" alt="QR Code" id="qrcode">
                        <h4>Scan me</h4>
                        <p class="text-muted">wait until QR Code show</p>
                      </div>
                      <div class="col">
                        <h3>Logs:</h3>
                        <ul class="logs" id="logs"></ul>
                      </div>
                    </div>
                  </div>
                </div>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.0/socket.io.js" crossorigin="anonymous"></script>
                <script>
                    $(document).ready(function() {
                        var socket = io.connect('http://127.0.0.1:8000', {path: '/socket.io'});
            
                        // var socket = io();
            
                        socket.on('message', function(msg) {
                            $('.logs').append($('<li>').text(msg));
                        });
            
                        socket.on('qr', function(src) {
                            $('#qrcode').attr('src', src);
                            $('#qrcode').show();
                        });
            
                        socket.on('ready', function(data) {
                            $('#qrcode').hide();
                        });
            
                        socket.on('authenticated', function(data) {
                            $('#qrcode').hide();
                        });
                    });
                </script>
            </div>
        </div>
     </div>

 @endsection