<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';

?>
	
	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Push notifications'); ?></span></h3>

						
						
						<div class="inside">
						<?php

								$varGA = (array)get_option( 'WPPush_ga' );
 								settings_fields( 'WPPush_main_ga' );
								if(!isset($varGA['apiLogin'])) $varGA['apiLogin']='';
								if(!isset($varGA['apiKey'])) $varGA['apiKey']='';
								$apiKey = get_option('apiKey');
								$apiLogin = get_option('apiLogin');
								 $urli = "http://52.27.101.150/mobrock/app/pnWPPush.php?login=".$apiLogin."&apiKey=".$apiKey."&longUrl=&format=json";
							if(json_decode(wp_remote_retrieve_body(wp_remote_get($urli)))->pn == "false"){	
								?>
									<h2 style="text-align: center;">
										<?php echo __('Increase customer engagement thanks to push notifications !'); ?>	
									</h2>
							<img src="<?php echo plugins_url(WPPUSH_APPNAME.'/assets/images/push.png'); ?>" style="width:100%">
							<p>Push notifications connect directly to your app's users. Keep them happy and engaged with app updates, promotions, and more sent directly to their desktop & mobile.</p>
							
							<center><h3>Give your website a voice thanks to push notifications</h3>
							
								
<table class="widefat" width="30%" style="  width: 36%;">
	<thead>
	<tr>
		<th class="row-title"><?php echo __( 'Push Notifications' ); ?></th>

	</tr>
	</thead>
	<tbody>
	<tr>
		<td class="row-title"><?php echo __( 'Chrome push notifications' ); ?></td>
		
	</tr>
		<tr>
		<td class="row-title"><?php echo __( 'Safari push notifications' ); ?></td>
		
	</tr>
		<tr>
		<td class="row-title"><?php echo __( 'Firefox push notifications (Soon)' ); ?></td>
		
	</tr>
	
	
	</tr>
	</tbody>
	<tfoot>
	<tr>
		<th class="row-title" style="color:green"><center><?php echo __( 'Upgrade Today only $2.99/mo' ); ?></center></th>
	
	</tr>
	</tfoot>
</table>
								<input type="hidden" name="user" id="user"  value="<?php echo get_bloginfo('url') ?>">
							<a class="button-primary" type="button" name="send"  id="pushNoteSend" style="margin: 12px;width: 300px;height: 54px;font-size: 21px;padding-top: 10px;" href="http://members.app-developers.biz/wppush-specials/" >Activate Push Notifcations</a>
						</center>
							<?php
	
	
							}else{
							
							?>
							
							<p class="message_invite"><?php echo __('Simply send out a message to all your app users in one go! Fill-out the form below and press send, our severs will take care of the rest.'); ?><a href="#"><? echo __('upgrade your account.'); ?></a></p>
							
							<center>
								<h2>Send a push notifcation</h2>
								<?php
								
								$apiKey = get_option('apiKey');
								$apiLogin = get_option('apiLogin');
								$apiDomain = get_option('wppush_domain');
								?>
								<input type="hidden" value="<?php echo get_bloginfo('name'); ?>" name="title" id="title">
								<input type="hidden" value="<?php echo $apiLogin; ?>" name="apiLogin" id="apiLogin">
								<input type="hidden" value="<?php echo $apiKey; ?>" name="apiKey" id="apiKey">
								<input type="hidden" value="<?php echo $apiDomain; ?>" name="domain" id="domain">
								
							<textarea id="txtCount" name="" cols="80" rows="10" placeholder="Your message" style="max-width:70%;"></textarea><br>
								<div><span id="counter"></span><font color="red"> characters left</font></div>
							
								<p>
								Notification link : <input name="notesURL" value="" placeholder="http://yoursite.com" type="text" id="url" style="width: 50%;">
								</p>
								<input class="button-primary" type="button" id="sendPushWPPush" name="send"  style="margin: 12px;width: 300px;height: 54px;font-size: 21px;" value="Send">
							</center>
							
							<?php
								}
							?>
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