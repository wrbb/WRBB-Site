var audio;
var playing = false;


jQuery(document).ready(function() {
    audio = new Audio('http://129.10.161.130:8000/');
    audio.volume = 0.5;

    jQuery("#playButton").click(function() {
        if (playing) {
            pauseAudio();
        } else {
            playAudio();
        }
    });

    var expanded = false;

    jQuery(document).on('click', '#expand-collapse', function(e){
        if (expanded) {
            jQuery("#expand-collapse").html('<i class="fa fa-caret-square-o-up fa-lg" aria-hidden="true"></i>');
            expanded = false;
            jQuery('.volume-controls').css('margin', '0');
        } else {
            expanded = true;
            jQuery("#expand-collapse").html('<i class="fa fa-caret-square-o-down fa-lg" aria-hidden="true"></i>');
            jQuery("#player-icon").width(jQuery(".playerbar").width() * 0.8);
            jQuery('.volume-controls').css('margin', (jQuery('.player-play-pause').outerWidth(true) / 2) + 'px');
        }
        jQuery('.player-controls').toggleClass('show');
        jQuery('.player-play-pause').toggleClass('show');
        jQuery('#player-icon').toggleClass('show');
        jQuery('.playerbar').toggleClass('expand');
        jQuery('.player-text').toggleClass('show');
        jQuery('#player-header').toggleClass('show');
        jQuery('#player-desc').toggleClass('show');
        console.log('we');
    });

    function pauseAudio() {
        audio.volume = 0;
        playing = false;
        document.getElementById("playButton").innerHTML = '<i class="fa fa-play-circle-o fa-lg" aria-hidden="true"></i>'
    }

    function playAudio() {
        audio.play();
        playing = true;
        setAudioLevel(document.getElementById('volume-slider').value / 100);
        document.getElementById("playButton").innerHTML = '<i class="fa fa-pause-circle-o fa-lg" aria-hidden="true"></i>'
    }

    function setAudioLevel(audioLevel){
        if (audioLevel > 1 || audioLevel < 0) {
            return;
        }
        audio.volume = audioLevel;
    }

    let slider = jQuery('#volume-slider');

    slider.on('input propertychange', function () {
        if (!playing) {
            return;
        }
        setAudioLevel(this.value / 100);
    });

});
