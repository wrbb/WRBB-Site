jQuery(document).ready(() => {
    let playing = false;
    let userHitPlay = false;
    const audio = new Audio('http://129.10.161.130:8000/listen');
    const playButton = '<i class="fas fa-play-circle fa-lg"></i>';
    const pauseButton = '<i class="fas fa-pause-circle fa-lg"></i>';

    let setAudioLevel = (audioLevel) => {
        if (
            // If the stream is "paused" (i.e. muted), don't change the volume when the user
            // moves the slider
            !playing ||
            // Don't accept invalid volume values
            audioLevel > 1 ||
            audioLevel < 0
        ) {
            return;
        }
        audio.volume = audioLevel;
    };

    let playAudio = () => {
        // Only start the audio when the user hits the play button the first time
        if (!userHitPlay) {
            let promise = audio.play();
            if (promise !== undefined) {
                promise.then(() => {
                    playAudio();
                }).catch(() => {
                    window.close();
                });
            } else {
                window.close();
            }
        }
        userHitPlay = true;

        playing = true;
        audio.muted = false;
        setAudioLevel(jQuery('#volume-slider').val() / 100);
        jQuery('.play-button').html(pauseButton);
    };

    let pauseAudio = () => {
        playing = false;
        audio.muted = true;
        jQuery('.play-button').html(playButton);
    };

    let toggleAudio = () => {
        if (playing) {
            pauseAudio();
        } else {
            playAudio();
        }
    };

    jQuery('.play-button').on('click', () => {
        toggleAudio();
    });

    jQuery('#volume-slider').on('change', () => {
        setAudioLevel(jQuery('#volume-slider').val() / 100);
    });
});

