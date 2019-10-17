<?php
/**
 * Template Name: Faq Page
 *
 * Template for displaying a FAQ page.
 *
 * @package understrap
 */
get_header();
// Just here until I figure out how the wp stuff works

$faqTitles = array('faq1', 'faq2', 'faq3', 'faq4');
$faqContent = array('faq1_content', 'faq2_content', 'faq3_content', 'faq4_content');

?>

<div class="wrapper" id="full-width-page-wrapper">
    <div id="faq-horizontal-rule">
        <span id="faq-horizontal-rule-text">FAQ</span>
    </div>
    <?php for ($i = 0; $i < count($faqTitles); $i++) :
        $title = $faqTitles[$i];
        $content= $faqContent[$i]; ?>
        <div class="faq-block">
            <h3><?php echo $title ?></h3>
            <h4><?php echo $content?></h4>
        </div>
    <?php endfor?>
</div>

<?php get_footer(); ?>
