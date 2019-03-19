<?php
/**
 * Template Name: DJ Show Menu Page
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$result = json_decode(queryApiShows(), true);
$items = unique_multidim_array($result['items'], 'id');

// usort($items, function ($item1, $item2) {
//     return $item1['title'] <=> $item2['title'];
// });
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<hr id="header-line">

		<h2 class="entry-header"><span class="single-title">dj show bios.</span></h2>
		
		<table style="width: 100%" class="shows">

			<?php foreach ($items as $show):
				date_default_timezone_set($show['timezone']);
				$startTime = date('gA', strtotime($show['start']));
				$endTime = date('-gA', strtotime($show['end']));
				$time = $startTime . $endTime; ?>

				<tr>
					<td><?php echo date('l', strtotime($show['start'])) ?></td>
					<td><?php echo $time ?></td>
					<td><?php echo $show['title'] ?></td>
				</tr>

			<?php endforeach; ?>

		</table><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
