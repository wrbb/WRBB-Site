<?php
/**
 * Template Name: Playerbar Popup
 * The popup window with the playerbar
 *
 * @package understraps
 */

include __DIR__ . '/../src/wrbb-templates/getClient.php';
// @var SpinitronApiClient $client
$result = $client->search( 'shows', [ 'start' => '+0 hour', 'count' => '1' ] );
$show = $result['items'][0]['title'];

$play_button = '<i class="fa fa-play-circle fa-2x"></i>';
$pause_button = '<i class="fa fa-pause-circle fa-2x"></i>';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title"
          content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body>
<script type="text/javascript">
    let playing = false;

    jQuery(document).ready(() => {
        const audio = new Audio('http://129.10.161.130:8000/');

        let setAudioLevel = (audioLevel) => {
            if (audioLevel > 1 || audioLevel < 0) {
                return;
            }
            audio.volume = audioLevel;
        };

        let playAudio = () => {
            playing = true;
            setAudioLevel(document.getElementById('volume-slider').value / 100);
            document.getElementById('popup-button').innerHTML = '<? echo $pause_button ?>'
        };

        let pauseAudio = () => {
            playing = false;
            setAudioLevel(0);
            document.getElementById('popup-button').innerHTML = '<? echo $play_button ?>';
        };

        let toggleAudio = () => {
            if (playing) {
                pauseAudio();
            } else {
                playAudio();
            }
        };

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

        jQuery('.play-button--popup').on('click', () => {
            toggleAudio();
        });

        jQuery(document).on('keydown', event => {
            if (event.keyCode === 32) {
                toggleAudio();
            }
        });

        jQuery('#volume-slider').on('change', () => {
            let val = jQuery('#volume-slider').val();
            console.log(val);
            setAudioLevel(val / 100);
        });
    });
</script>

<div class="playerbar playerbar--popup">
    <p class="current-show">
        <strong>Current Show:</strong>
        <br>
        <? echo $show ?>
    </p>
    <div class="player-controls">
        <div class="player-play-pause">
            <a class="play-button--popup" id="popup-button">
	            <? echo $play_button ?>
            </a>
        </div>
        <div class="volume-controls">
            <i id="volume-icon" class="fa fa-volume-up fa-lg" aria-hidden="true"></i>
            <label for='volume-slider'></label>
            <input
                id='volume-slider'
                type="range"
                min="1"
                max="100"
                step="1"
                value="50"
            >
        </div>
    </div>
</div>
</body>
</html>