<?php
/**
 * Playerbar Popup window containing the playerbar controls
 *
 * @author Spencer LaChance
 * @package understraps
 */

include 'getClient.php';
// @var SpinitronApiClient $client
$result = $client->search( 'shows', [ 'start' => '+0 hour', 'end' => '+1 hour', 'count' => '1' ] );
$show = count($result['items']) == 0 ? "WRBB ROBOT DJ" : $result['items'][0]['title'];

$play_button = '<i class="fa fa-play-circle fa-2x"></i>';
$pause_button = '<i class="fa fa-pause-circle fa-2x"></i>';

$is_radiojar = false;
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
	<link rel="stylesheet" href="//www.radiojar.com/wrappers/api-plugins/v1/css/player.css">
	<?php wp_head(); ?>
</head>
<body>

<?php if ($is_radiojar) : ?>

<div id="rj-player">
 <div class="player-v3 player-medium">
  <div id="rj-cover">
    <a href="#"><img src=""/></a>
  </div>
  <div class="info">
   <div class="rjp-trackinfo-container">
    <h4 class="rjp-label">Now playing:</h4>
    <p id="trackInfo" class="rjp-info"></p>
   </div>
   <div class="rjp-player-container">
    <div id="rjp-radiojar-player"></div>
    <div id="rj-player-controls" class="rj-player-controls">
     <div class="jp-gui jp-interface">
      <div class="jp-controls">
       <a href="javascript:;" style="display:block" class="jp-play" title="Play">&nbsp;<i class="icon-play"></i></a>
       <a href="javascript:;" style="display:none" class="jp-pause" title="Pause"><i class="icon-pause"></i></a>
       <a href="javascript:;" style="display:block" class="jp-mute"  title="Mute"><i class="icon-volume-up"></i></a>
       <a href="javascript:;" style="display:none" class="jp-unmute" title="Unmute"><i class="icon-volume-off"></i></a>
       <div class="jp-volume-bar-wrapper">
        <div class="jp-volume-bar">
         <div class="jp-volume-bar-value"></div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <div class="jp-no-solution">
     <span>Update Required</span>
     To play the media you will need to either update your browser to a recent version or update your <a href="//get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
   </div>
  </div>
 </div>
</div>
<script type="text/javascript" src="//www.radiojar.com/wrappers/api-plugins/v1/radiojar-min.js"></script>
<script>
 rjq('#rjp-radiojar-player').radiojar('player', {
  "streamName": "9950r946bzzuv",
  "enableUpdates": true,
  "defaultImage": "//www.radiojar.com/img/sample_images/Radio_Stations_Avatar_BLUE.png",
  "autoplay": true
 });
 rjq('#rjp-radiojar-player').off('rj-track-load-event');
 rjq('#rjp-radiojar-player').on('rj-track-load-event', function(event, data) {
   updateInfo(data);
   if (data.title != "" || data.artist != "") {
     rjq('.rjp-trackinfo-container').show();
     rjq('#trackInfo').html(data.artist + ' - "' + data.title + '"')
   } else {
     rjq('.rjp-trackinfo-container').hide();
   }
 });

 function updateInfo(data) {
   if (data.thumb) {
     rjq('#rj-cover').html('<a href="#"><img src="' + data.thumb + '" alt="" title="" /></a>')
   } else {
     rjq('#rj-cover').html('')
   }
 }
</script>

<?php else : ?>

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
            document.getElementById('popup-button').innerHTML = '<?php echo $pause_button ?>'
        };

        let pauseAudio = () => {
            playing = false;
            setAudioLevel(0);
            document.getElementById('popup-button').innerHTML = '<?php echo $play_button ?>';
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
            setAudioLevel(val / 100);
        });
    });
</script>

<div class="playerbar playerbar--popup">
    <p class="current-show">
        <strong>Current Show:</strong>
        <br>
		<?php echo $show ?>
    </p>
    <div class="player-controls">
        <div class="player-play-pause">
            <a class="play-button--popup" id="popup-button">
			    <?php echo $play_button ?>
            </a>
        </div>
        <div class="volume-controls">
            <i id="volume-icon" class="fa fa-volume-up fa-lg" aria-hidden="true"></i>
            <label for='volume-slider'></label>
            <input id='volume-slider' type="range" min="1" max="100" step="1" value="50">
        </div>
    </div>
</div>

<?php endif ?>

</body>
</html>
