<?php
/**
 * Playerbar
 * The toast in the corner of the website that launches the popup window
 *
 * @package understraps
 */
?>

<div class="playerbar">
    <div class="player-controls">
        <div>
            <h3 class="player-text">Listen Live</h3>
            <div class="play-button">
                <i class="fas fa-play-circle fa-lg"></i>
            </div>
        </div>
        <div class="volume-controls">
            <i class="fa fa-volume-up fa-md" aria-hidden="true"></i>
            <label for='volume-slider'></label>
            <input id='volume-slider' type="range" min="1" max="100" step="1" value="50">
        </div>
    </div>
</div>
