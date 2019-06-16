 <?php
/**
 * Template Name: DJ Show Bio Page
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$showID = $_GET['id'];

include __DIR__ . '/../src/wrbb-templates/getClient.php';
// @var SpinitronApiClient $client
$show = $client->search('shows/'.$showID, []);

date_default_timezone_set($show['timezone']);
$startTime = date('l gA', strtotime($show['start']));
$endTime = date('-gA', strtotime($show['end']));
$time = $startTime . $endTime;

$playlists = $client->search('playlists', ['show_id' => $showID, 'count' => '300s']);
$playlistCount = count($playlists['items']);
$tableCount = ceil($playlistCount / 20);
echo '<script>';
echo 'var tableCount = ' . json_encode($tableCount) . ';';
echo '</script>';
?>

<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<hr id="header-line">
		<h2 class="entry-header"><span class="single-title">dj show bios.</span></h2>

		<!-- Check if there is a DJ logo for this show and display it if there is -->
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
			<!-- Show image from Spinitron -->
			<div class="col-sm-2">
				<img class="show-image" src="<?php echo $show['image'] ?>">
			</div>

			<div class="col-sm-6">
				<!-- Show title -->
				<h2 class="show-title"><?php echo $show['title'] ?></h2>
				 
				<!-- Gets and displays the hosts' names -->
				<p>With 
					<?php $n = count($show['_links']['personas']);
					for ($i = 0; $i < $n - 1; $i++) {
						$url = $show['_links']['personas'][$i]['href'];
						$persona_id = substr(strrchr($url, '/'), 1);
						$persona = $client->search('personas/' . $persona_id, []);
						echo "<a href=\"https://spinitron.com/WRBB/dj/" . $persona_id . "\" target=\"_blank\">"
						 . $persona['name'] . '</a>, ';
					}
					$url = $show['_links']['personas'][$n - 1]['href'];
					$persona_id = substr(strrchr($url, '/'), 1);
					$persona = $client->search('personas/' . $persona_id, []);
					echo "<a href=\"https://spinitron.com/WRBB/dj/" . $persona_id . "\" target=\"_blank\">"
					 . $persona['name'] . '</a>'; ?>
				</p>

				<!-- Show time and description -->
				<p>Listen live: <?php echo $time ?></p>
				<?php echo $show['description'] ?>

				<!-- The PLAYLISTS -->
				<div class="playlists">
					<h3>Playlists Logged</h3>
					<table style="width: 100%;" id="playlistTable1">
						<?php for ($i = 0; $i < min(20, $playlistCount); $i++):
							$playlist = $playlists['items'][$i];
							$playlistStart = strtotime($playlist['start']);
							$playlistEnd = strtotime($playlist['end']); ?>
							<tr>
								<td class="pl-month"><?php echo date('F', $playlistStart) ?></td>
								<td><?php echo date('jS', $playlistStart) ?></td>
								<td><?php echo date('Y', $playlistStart) ?></td>
								<td><?php echo date('gA', $playlistStart) ?>-
									<?php echo date('gA', $playlistEnd) ?></td>
								<td><a href="https://spinitron.com/WRBB/pl/<?php echo $playlist['id'] ?>" target="_blank">
									Playlist</a><span style="color: red">&rsaquo;</span></td>
							</tr>
						<?php endfor; ?>
					</table>

					<!-- If there are more than 20 playlists for the show, generate hidden tables (20 playlists per) for the remaining ones -->
					<?php for ($k = 1; $k < $tableCount; $k++): ?>
						<table style="width: 100%; display: none;" id="playlistTable<?php echo $k+1 ?>">
							<?php for ($i = $k * 20; $i < min(($k + 1) * 20, $playlistCount); $i++):
								$playlist = $playlists['items'][$i];
								$playlistStart = strtotime($playlist['start']);
								$playlistEnd = strtotime($playlist['end']); ?>
								<tr>
									<td class="pl-month"><?php echo date('F', $playlistStart) ?></td>
									<td><?php echo date('jS', $playlistStart) ?></td>
									<td><?php echo date('Y', $playlistStart) ?></td>
									<td><?php echo date('gA', $playlistStart) ?>-
										<?php echo date('gA', $playlistEnd) ?></td>
									<td><a href="https://spinitron.com/WRBB/pl/<?php echo $playlist['id'] ?>" target="_blank">
										Playlist</a><span style="color: red">&rsaquo;</span></td>
								</tr>
							<?php endfor; ?>
						</table>
					<?php endfor ?>

					<!-- The buttons for cycling through the tables of playlists -->
					<?php if ($tableCount > 1): ?>
						<div class="playlist-buttons">
							<?php for ($j = 1; $j <= $tableCount; $j++):
								echo "<button class=\"btn playlistButton\">" . $j . "</button>";
							endfor; ?>
						</div>
					<?php endif ?>
				</div><!-- .playlists end -->
			</div><!-- .col-sm-6 end -->
		</div><!-- .row end -->

	</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>