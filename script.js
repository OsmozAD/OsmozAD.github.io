navigator.mediaDevices.getUserMedia({ video: true })
  .then(function(stream) {
    var video = document.getElementById('video-preview');
    video.srcObject = stream;
    video.play();
  });

var canvas = document.getElementById('canvas-preview');
var video = document.getElementById('video-preview');
var context = canvas.getContext('2d');

document.getElementById('capture-button').addEventListener('click', function() {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  context.drawImage(video, 0, 0, canvas.width, canvas.height);
});

var dataURL = canvas.toDataURL('image/png');