<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';
$url = "http://vimeo.com/api/v2/".VIMEO_VIDEO_WPPUSH."/videos.json";

$request = wp_remote_get($url);

$postas = json_decode(wp_remote_retrieve_body( $request ),true);

if(!isset($posta['user_url'])) $posta['user_url']='';
if(!isset($posta['id'])) $posta['id']='';
if(!isset($posta['description'])) $posta['description']='';
if(!isset($posta['user_name'])) $posta['user_name']='';

?>
	
	<div id="poststuff">
		
		<div id="the-list">
				
		<?php		
		foreach ($postas as $posta) {
			?>
<div class="plugin-card plugin-card-akismet">
			<div class="plugin-card-top wordapp-plugin-card-top">
				<a href="https://player.vimeo.com/video/<?php echo $posta['id']; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox plugin-icon"><img src="<?php echo $posta['thumbnail_small']; ?>"></a>
				<div class="name column-name">
					<h4><a href="https://player.vimeo.com/video/<?php echo $posta['id']; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox"><?php echo $posta['title']; ?></a></h4>
				</div>
				<div class="action-links">
					<ul class="plugin-action-buttons"><li><a href="https://player.vimeo.com/video/<?php echo $posta['id']; ?>?TB_iframe=true&amp;width=772&amp;height=259" class="thickbox install-now button" href="" aria-label="Watch Now" data-name="Watch Now">Watch Now</a></li><li></li></ul>				</div>
				<div class="desc column-description">
					<p><?php echo $posta['description']; ?></p>
					<p class="authors"> <cite>By <a href="<?php echo $posta['user_url']; ?>"><?php echo $posta['user_name']; ?></a></cite></p>
				</div>
			</div>
			<div class="plugin-card-bottom wordapp-plugin-card-bottom">
				
				<div class="column-updated">
					<strong><?php echo __('Duration'); ?></strong> <span title="6 Jul 2015 @ 23:44">
						<?php echo round($posta['duration']/60,2); ?> mins				</span>
				</div>
				
				<div class="wordapp-column-compatibility">
					<span class=""><strong><?php echo __('Tags'); ?> :</strong> <?php echo $posta['tags']; ?></span>				</div>
			</div>
		</div>

<?php
		}
?>

			</div>
</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>
