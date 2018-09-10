var audio;
var playing = false;


jQuery(document).ready(function() {
    audio = new Audio('http://129.10.161.130:8000/');
    audio.volume = 0.5;
})

jQuery( "#playButton" ).click(function() {
 if(playing) {
     pauseAudio();
 } else {
     playAudio();
 }
});

var expanded = false;

document.querySelector('#expand-collapse').addEventListener('click', function() {
    if(expanded) {
        document.getElementById("expand-collapse").innerHTML = '<i class="fa fa-caret-square-o-up fa-lg" aria-hidden="true"></i>'
        expanded = false;
        jQuery('.volume-controls').css('margin','0');
    } else {
        expanded = true;
        document.getElementById("expand-collapse").innerHTML = '<i class="fa fa-caret-square-o-down fa-lg" aria-hidden="true"></i>'
        jQuery("#player-icon").width(jQuery(".playerbar").width() * 0.8);
        jQuery('.volume-controls').css('margin', (jQuery('.player-play-pause').outerWidth(true)/2) + 'px');
    }
    document.querySelector('.player-controls').classList.toggle('show');
    document.querySelector('.player-play-pause').classList.toggle('show');
    document.querySelector('#player-icon').classList.toggle('show');
    document.querySelector('.playerbar').classList.toggle('expand');
    document.querySelector('.player-text').classList.toggle('show');
    document.querySelector('#player-header').classList.toggle('show');
    document.querySelector('#player-desc').classList.toggle('show');
});

let pauseAudio = () => {
    audio.volume = 0;
    playing = false;
    document.getElementById("playButton").innerHTML = '<i class="fa fa-play-circle-o fa-lg" aria-hidden="true"></i>'
}

let playAudio = () => {
    audio.play();
    playing = true;
    setAudioLevel(document.getElementById('volume-slider').value / 100);
    document.getElementById("playButton").innerHTML = '<i class="fa fa-pause-circle-o fa-lg" aria-hidden="true"></i>'
}

let setAudioLevel = (audioLevel) => {
    if(audioLevel > 1 || audioLevel < 0) {
        return;
    }
    audio.volume = audioLevel;
}

let slider = document.getElementById('volume-slider');

slider.oninput = function() {
    if(!playing) {
        return;
    }
    setAudioLevel(this.value / 100);
}
