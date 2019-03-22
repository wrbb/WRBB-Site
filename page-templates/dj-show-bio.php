 <?php
/**
 * Template Name: DJ Show Bio Page
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$showID = intval(substr(strrchr($current_url, "/"), 1));

$show = json_decode(queryApiShowById($showID), true);

date_default_timezone_set($show['timezone']);
$startTime = date('l gA', strtotime($show['start']));
$endTime = date('-gA', strtotime($show['end']));
$time = $startTime . $endTime;

$playlists = json_decode(queryApiPlaylistsById($showID), true);
?>

<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<hr id="header-line">
		<h2 class="entry-header"><span class="single-title">dj show bios.</span></h2>

		<?php $path = '/src/img/djlogos/' . $show['title'] . '.jpg';
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . substr(WP_CONTENT_URL, 16) . '/themes/WRBB-Site' . $path)): ?>
			<br>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-6">
					<img class="dj-logo" src="<?php echo get_bloginfo('template_url').$path ?>">
				</div>
			</div>
		<?php endif ?>
		
		<div class="row" id="dj-show-content">
			<div class="col-sm-2">
				<img class="show-image" src="<?php echo $show['image'] ?>">
			</div>

			<div class="col-sm-6">
				<h2 class="show-title"><?php echo $show['title'] ?></h2>
				<p>Listen live: <?php echo $time ?></p>
				<?php echo $show['description'] ?>
				<div class="playlists">
					<h3>Playlists Logged</h3>
					<table style="width: 100%;">
						<?php foreach ($playlists['items'] as $playlist):
							$playlistStart = strtotime($playlist['start']);
							$playlistEnd = strtotime($playlist['end']);
							$persona = json_decode(queryApiPersonaById($playlist['persona_id']), true) ?>
							<tr>
								<td><?php echo date('F', $playlistStart) ?></td>
								<td><?php echo date('jS', $playlistStart) ?></td>
								<td><?php echo date('Y', $playlistStart) ?></td>
								<td><?php echo date('gA', $playlistStart) ?>-
									<?php echo date('gA', $playlistEnd) ?></td>
								<td><a href="https://spinitron.com/WRBB/dj/<?php echo $playlist['persona_id'] ?>" target="_blank">
									<?php echo $persona['name'] ?></a></td>
								<td><a href="https://spinitron.com/WRBB/pl/<?php echo $playlist['id'] ?>" target="_blank">
									Playlist</a><span style="color: red">&rsaquo;</span></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div><!-- .playlists end -->
			</div><!-- .col-sm-6 end -->
		</div><!-- .row end -->

	</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>