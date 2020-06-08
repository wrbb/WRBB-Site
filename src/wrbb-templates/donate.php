<?php
/**
 * Contact Page
 *
 * @author Chris Sims
 * @package understraps
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content">

        <hr class="header-line">

        <h2 class="entry-header"><span class="article-title">support.</span></h2>

        <div class="padding-top-bottom_small">
            <p class="donate-text">
                WRBB 104.9FM started out its life as WNEU in December of 1962, and for nearly 60 years, we continue to be a cornerstone of music culture at Northeastern University. In its current iteration, WRBB is still a completely student-run and freeform radio station that strives to offer students and members of the community with the best in independent radio.
            </p>
            <p class="donate-text">
                With nearly 200 students involved in a multitude of functions ranging from broadcasting to graphic design, WRBB is an interdisciplinary hub where students who love music can come together as one. Consider making a donation today to help fund our passion for music, radio, and much more.<br>
            </p>
        </div>

        <a href="https://giving.northeastern.edu/live/profiles/440-club-wrbb">
            <button id="donate-button">Donate</button>
        </a>
    </div>
</div>

<?php get_footer() ?>
