<?php
/**
 * Playerbar
 * The toast in the corner of the website that launches the popup window
 *
 * @package understraps
 */
?>

<div class="playerbar">
    <h2 id="player-header">Listen Live</h2>
    <div class="player-controls">
        <div class="play-button">
            <i class="fas fa-play-circle fa-lg"></i>
        </div>
        <label for='volume-slider'></label>
        <input id='volume-slider' type="range" min="1" max="100" step="1" value="50">
    </div>
</div>
