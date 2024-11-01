<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';

?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Welcome to ').WPPUSH_APPNAME_FRIENDLY; ?></span></h3>

						<div class="inside">
							
							<p class="message_invite">
								<?php echo '<br />'; echo __('Get your 1 extra month for free by inviting 8 friends via email '); ?></p>
							
							<center>
								<h2><?php _e('Invite your friends via email & get your second month for <u>FREE</u>'); ?></h2>
								<input type="hidden" name="email" id="email" value="<?php echo get_bloginfo('admin_email') ?>">
								<input type="hidden" name="url" id="url" value="<?php echo get_bloginfo('url') ?>">
								
								<input type="hidden" name="user" id="user" placeholder="Your Name" value="<?php echo get_bloginfo('name') ?>">
								<input type="text" name="name" id="name" placeholder="Please enter your name" value="" style="width:60%"><br>
							<textarea id="emails" name="emails" cols="80" rows="10" style="max-width:70%" placeholder="One of your friends email address per row"></textarea><br>
							<input class="button-primary" type="button" name="send" id="inviteFriends" style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value="Send">
							<hr>
							
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
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">


						<div class="inside">
							<p>
							 <?php include plugin_dir_path( __FILE__ ).'more_info.php'; ?>
							</p>
						</div>
					
						<!-- .inside -->

					</div>
					<!-- .postbox -->
				

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>

<style>
	.message_invite{
		font-family: "Open Sans","lucida grande","Segoe UI",arial,verdana,"lucida sans unicode",tahoma,sans-serif;
  		font-size: 13px;
  		color: #3d464d;
  		font-weight: normal;
		text-align: center;
	}

	</style>