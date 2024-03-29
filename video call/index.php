<html>

<head>
    <title>Video Chatt</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>

<body>
<?php


include 'nav.php'

?>

    
    <div class="entry-modal" id="entry-modal">
        <p>Create or Join Video Chat</p>
        <input id="room-input" class="room-input" placeholder="Enter Room ID">
        <div class="room">
            
            <button onclick="createRoom()">Create Room</button>
            <button onclick="joinRoom()">Join Room</button>
            
        </div>
    </div>
    <div class="meet-area">
        <!-- Remote Video Element-->
        <video id="remote-video">
            <p> Video Appear Here........</p>
        </video>

        <!-- Local Video Element-->
        <video id="local-video"></video>
        <div class="meet-controls-bar" id="meet-controls-bar" >
            <img src="../client/assets/img/icon/share.png" onclick="startScreenShare()">
               
               
            <img src="../client/assets/img/icon/close.png"  onClick="window.location.reload();"
             style="width: 36px; height: 36px;" >

             <!-- <button onclick="mute()"> Mute </button>
             <button onclick="unmute()"> Unmute </button> -->
            
           

        </div>
    </div>
</body>

<script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>
<script src="script.js"></script>

</html>

<style>
    body{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    color: rgb(250, 250, 250);
}



.entry-modal{
    border: 1px solid #eceaea;
    width: 300px;
    margin: auto;
    z-index: 9999;
    position: absolute;
    left: 46%;
    top: 7pc;
    margin-left: -150px;
    padding: 5px;
    color: #ea0909;
    background-color: rgb(232 232 232);
    text-align: center;
    height: 10pc;
}

#notification{
    position: absolute;
    z-index: 1;
    text-align: center;
    color: #fff;
    margin: 0;
    top: 47.33px;
    font-size: 18pt;
    width: 50%;
    background-color: rgb(231, 58, 27);
}


.room-input{
  border: none;
  padding:5px;
}

button{
    margin: 3px;
    padding: 5px;
}

#remote-video{
    top: 5pc;
    height: 60%;
    width: 50%;
    left: 20pc;
    background-color: lightgray;
    position: absolute;
    z-index: 0;
}

#local-video{
    top: 30pc;
    width: 400px;
    object-fit: cover;
    height: 16pc;
    z-index: 1;
    background-color: #dcdbdb;
    position: absolute;
    left: 69pc;
    z-index: 0;
}
.meet-controls-bar{
  
    position: absolute;
    width: 8%;
    top: 42pc;
    left: 70pc;
    display: flex;
    width: 24pc;
    justify-content: space-around;
}
.meet-controls-bar button{
    border-radius: 50%;
}

.meet-controls-bar  img{
    width: 36px;
    height: 36px;
    background-color: aliceblue;
    border-radius: 35%;
}

.room{
    position: relative;
    top: 30px;
}

.room button{
    margin: 3px;
    padding: 5px;
    background-color: white;
    box-shadow: 0px -2px 11px 2px #a3a0a8;
    border: 1px solid #e8e8e8;
    font-family: inherit;
    font-weight: 500;
    border-radius: 10px;
}

.entry-modal input{
    border-radius: 10px;
}

.arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
  position: relative;
  right: 9pc;
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

</style>

