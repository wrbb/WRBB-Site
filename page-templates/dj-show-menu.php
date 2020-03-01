<?php
/**
 * Template Name: DJ Show Menu Page
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

include __DIR__ . '/../src/wrbb-templates/getClient.php';
// @var SpinitronApiClient $client
$result = $client->search('shows', ['start' => '+1 week', 'count' => '200']);

$items = $result['items'];
$i = 0;
foreach ($items as $show) {
	if ($show['id'] == 72215) {
		$items[$i]['title'] = "Smooth Grooves";
	}
	if ($show['id'] == 72227) {
		$items[$i]['title'] = "the runaround";
	}
	$i += 1;
}

array_multisort(array_map('strtolower', array_column($items, 'title')), $items);
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<hr id="header-line">

		<h2 class="entry-header"><span class="single-title">dj show bios.</span></h2>
		
		<div class="row shows">

			<?php foreach ($items as $show):
				date_default_timezone_set($show['timezone']);
				$startTime = date('gA', strtotime($show['start']));
				$endTime = date('-gA', strtotime($show['end']));
				$time = $startTime . $endTime; ?>

				<div class="col-sm-3">
					<a href="<?php bloginfo('url'); ?>/dj-show-bio?id=<?php echo $show['id'] ?>"><img src="<?php echo $show['image'] ?>">
					<h5><?php echo $show['title'] ?></h5></a>
					<p><?php echo date('l', strtotime($show['start'])) ?> <?php echo $time ?></p>
				</div>
			<?php endforeach; ?>

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
