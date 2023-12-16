<!DOCTYPE html>
<html>
<head>
    <title>WebRTC Video Calling example here </title>
</head>
<body>

    <div id="local-video"></div>
    <div id="remote-videos"></div>

    <script src="https://simplewebrtc.com/latest-v3.js"></script>
    <script>
        var webrtc = new SimpleWebRTC({
            url: 'wss://your-signaling-server-url.com',
            localVideoEl: 'local-video',
            remoteVideosEl: 'remote-videos',
            autoRequestMedia: true
        });

        webrtc.on('connectionReady', function () {
            console.log('Connected to signaling server');
        });

        webrtc.on('incomingCall', function () {
            console.log('Incoming call');
            webrtc.answer();
        });

        webrtc.on('videoAdded', function (video, peer) {
            console.log('Video chat started');
        });

        webrtc.on('videoRemoved', function (video, peer) {
            console.log('Video chat ended');
        });

        webrtc.startLocalVideo();

        function endCall() {
            webrtc.hangup();
        }
    </script>

    <button onclick="endCall()">End Call</button>

</body>
</html>
