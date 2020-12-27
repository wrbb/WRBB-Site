<?php
/**
 * Playerbar Popup window containing the playerbar controls
 *
 * @author Spencer LaChance
 * @package understraps
 */

include 'getClient.php';
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
	<link rel="stylesheet" href="//www.radiojar.com/wrappers/api-plugins/v1/css/player.css">
	<?php wp_head(); ?>
</head>
<body>
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
  "autoplay":false
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
</body>
</html>
