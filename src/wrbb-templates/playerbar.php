<?php
/**
 * Playerbar
 * The toast in the corner of the website that launches the popup window
 *
 * @package understraps
 */
?>

<script type="text/javascript">
    openWindow = () => {
        window.open('/wordpress/playerbar-popup', 'win2',
            'status=no,toolbar=no,scrollbars=no,titlebar=no,menubar=no,width=300,height=150,' +
            'directories=no,location=no');
    }
</script>

<div class="playerbar playerbar--toast">
    <h2 id="player-header">Listen Live</h2>
    <div class="player-text">
        <button class="play-button--toast" onclick="openWindow()">
            <i class="fas fa-play-circle fa-lg"></i>
        </button>
        <span id="player-desc">WRBB Radio</span>
    </div>
</div>
