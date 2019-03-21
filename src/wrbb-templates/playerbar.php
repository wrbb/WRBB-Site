<?php
/**
 * Template Name: Playerbar
 * The template for the playerbar located on the bottom of the screen
 *
 * @package understraps
 */
 ?>

<div class="playerbar">
    <button id="expand-collapse">
        <i class="fa fa-caret-square-o-up fa-lg" aria-hidden="true"></i>
    </button>

    <div id="player-icon">
            <img src="wp-content/themes/WRBB-Site/src/img/logoPlayerBar.png"></img>
    </div>

    <div class="player-text">
        <h2 id="player-header">Listen Live</h2>
        <p id="player-desc">WRBB Radio</p>
    </div>



    <div class="player-controls">
        <div class="player-play-pause">
              <button id="playButton" type="submit">
                  <i class="fa fa-play-circle-o fa-lg" aria-hidden="true"></i>
              </button>
          </div>
          <div class="volume-controls">
              <i id="volume-icon" class="fa fa-volume-up fa-lg" aria-hidden="true"></i>
              <input id='volume-slider' type="range" min="1" max="100" value="50">
          </div>
      </div>
 </div>
