<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';


	$activate = '';
 	$url = "http://52.27.101.150/mobrock/app/activateJsonWPPush.php";
	$activate = json_decode(wp_remote_retrieve_body(wp_remote_get($url)),true);	

?>
	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-1">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						

						<div class="inside">
						<center>	
 <img style="  width: 100%;max-width:250px" src="<?php echo plugin_dir_url(WPPUSH_APPNAME.'/assets/images/logoO1.png', __FILE__); ?>logoO1.png">
							<h1><?php _e('Congratulations you are ready! ');?></h1>
<div style="width:100%;height:100%;height: 400px; float: none; clear: both; margin: 2px auto;">
  <embed src="<?php echo $activate['homeVideo']; ?>?version=3&amp;hl=en_US&amp;rel=0&amp;autohide=1&amp;autoplay=0" wmode="transparent" type="application/x-shockwave-flash" width="100%" height="400px" allowfullscreen="true" title="Adobe Flash Player">
</div>
						<center>	<p><?php echo __('Welcome to ').AWPPUSH_APPNAME_FRIENDLY.__(', Keep your visitors coming back thanks to push notifications'); ?></p>
							
					
													
							<a href="admin.php?page=WPPush" class="button-primary" type="button" name="send"  style="margin: 12px;width: 300px;height: 54px;font-size: 21px;padding-top: 11px;" >Get started now!</a>
		
							</center>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
				<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
<style>
.WPPushheader{
	display:none;
	
}
</style>
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>