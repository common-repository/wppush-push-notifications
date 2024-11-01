<?php

include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Settings ').WPPUSH_APPNAME; ?></span></h3>

						<div class="inside">
							
							<form method="post" action="options.php">
    <?php  
    		$varGA = (array)get_option( 'WPPush_ga' );
 			settings_fields( 'WPPush_main_ga' );

			if(!isset($varGA['email'])) $varGA['email'] ='';
			if(!isset($varGA['apiKey'])) $varGA['apiKey'] ='';
			if(!isset($varGA['apiDomain'])) $varGA['apiDomain'] ='';
			if(!isset($varGA['apiLogin'])) $varGA['apiLogin'] ='';
			if(!isset($varGA['google'])) $varGA['google'] ='';
			if(!isset($varGA['powered'])) $varGA['powered'] ='';
			if(!isset($varGA['chatHide'])) $varGA['chatHide'] ='';
			if(!isset($varGA['plugin_rm'])) $varGA['plugin_rm'] ='';
								
								
			if(!isset($varGA['wantsTo'])) $varGA['wantsTo'] ='wants to';
			if(!isset($varGA['sendYouNotifications'])) $varGA['sendYouNotifications'] ='Send you notifications';
			if(!isset($varGA['allowBtn'])) $varGA['allowBtn'] ='Allow';
			if(!isset($varGA['blockBtn'])) $varGA['blockBtn'] ='Block';
			if(!isset($varGA['popAllowPush'])) $varGA['popAllowPush'] ='Allow '.$varGA['apiDomain'].' push notifications';
			
			?>
						
								  <p>
      
		
						
	
								
	<h3>Push Icon</h3>					
	<hr>							
	 	<p> 	<label for="WPPush_ga[icon]"><?php  _e('Push Icon' ); ?></label>
  <input type="text" id="WPPush_icon" name="WPPush_ga[icon]" value="<?php echo esc_url(  $varGA['icon'] ); ?>" />
        <input id="upload_icon_button" type="button" class="button" value="<?php _e( 'Upload Icon' ); ?>" /> (<?php  _e('Icon Size 256x256' ); ?>)
        <br />
        <?php
        if($varGA['icon'] == ""){
        $img_url = plugins_url(WPPUSH_APPNAME)."/images/no-image-icon.jpg";
        }
        else{
         $img_url = $varGA['icon'];
        }
        ?>
        <img src="<?php echo esc_url(  $img_url ); ?>" style="max-width:200px;border: 2px dashed #e5e5e5;padding: 5px;    margin: 10px;margin-left: 61px;" alt="" id="icon_url" title="" width="" height="" class="alignzone size-full wp-image-125" /></a>
        </p> 	
						
						
<h3>API credentials</h3>
						
	<hr>
	<p>Protect these like a password</p>	
									<?php

	$apiKey = get_option('apiKey');
	if($apiKey == ""){
		$apiKey =  uniqid();
		update_option( 'apiKey', $apiKey);

	}

	$apiLogin = get_option('apiLogin');
	if($apiLogin == ""){
		$apiLogin =  uniqid();
		update_option( 'apiLogin', $apiLogin);
	
	}

$apiDomain = get_option('wppush_domain');


	?>
	<p>  	<label for="WPPush_GA[apiLogin]"><?php echo __('API Login' ); ?></label>
 	<input type="text" id="WPPushGA_apiLogin" name=""  value="<?php echo $apiLogin; ?>" readonly/></p>
	
	<p>  	<label for="WPPush_GA[apiKey]"><?php echo __('API Key' ); ?></label>
 	<input type="text" id="WPPushGA_apiKey" name=""  value="<?php echo $apiKey; ?>" readonly /></p>
	
	<p>  	<label for="WPPush_GA[apiDomain]"><?php echo __('API Domain' ); ?></label>
 	<input type="text" id="WPPushGA_apiDomain" name=""  value="<?php echo $apiDomain; ?>" readonly /></p>
		<?php			echo '<img src="https://push.wppush.co/wppush/activateIcon.php?title='.urlencode( get_bloginfo('name') ).'&img='.urlencode( esc_url( $img_url )).'&apiLogin='.$apiLogin.'&domain='.$apiDomain.'&longUrl=&format=json">'; ?>
		 												
	<h3>White Label</h3>
								
	<hr>					
	 <p>
			<?php echo __('Remove powered by link ?' ); ?><br />
    	   	<label for="WPPush_GA[powered]"><?php echo __('Yes ? ' ); ?></label>
		 <?php if (($activate->apiLogin == $varGA['apiLogin']) && ($activate->apiKey == $varGA['apiKey'])) { ?>
		 <input type="checkbox" name="WPPush_ga[powered]" id="poweredOff" value="off" <?php echo ($varGA['powered'] == 'off' ? 'checked' : '')?>>
		 <?php } ?>
		<font color="grey"> <?php echo __('Remove powered by (PRO only)'); ?> 
			<a href="https://members.app-developers.biz/WPPush-specials/"><?php echo __('Upgrade'); ?></a></font>  </p>								
		
								
		
	<h3>Hide Notification Center</h3>
								
	<hr>					
	 <p>
			<?php echo __('Remove Notification Center?' ); ?><br />
    	   	<label for="WPPush_GA[powered]"><?php echo __('Yes ? ' ); ?></label>
		 <input type="checkbox" name="WPPush_ga[ncenter]" id="ncenterOff" value="off" <?php echo ($varGA['ncenter'] == 'off' ? 'checked' : '')?>>
		 </p>								
		<h3>Limit of push notifications in the notification center</h3>
								
	<hr>					
	 <p>
			<br />
    	   	<label for="WPPush_GA[ncenterLimit]"><?php echo __('How many to show?' ); ?></label>
		<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[ncenterLimit]"  value="<?php echo ($varGA['ncenterLimit'] == '' ? '10' : $varGA['ncenterLimit'])?>"/>
		 </p>								
	
	<?php
				/*
				
			if(!isset($varGA['wantsTo'])) $varGA['wantsTo'] ='wants to';
			if(!isset($varGA['sendYouNotifications'])) $varGA['sendYouNotifications'] ='Send you notifications';
			if(!isset($varGA['allowBtn'])) $varGA['allowBtn'] ='Allow';
			if(!isset($varGA['blockBtn'])) $varGA['blockBtn'] ='Block';
			if(!isset($varGA['popAllowPush'])) $varGA['popAllowPush'] ='Allow '.$varGA['apiDomain'].' push notifications';
			
				*/		
						
				?>					
						
	<h3>Popup translate/wording</h3>
								
	<hr>					
	 <p>
    	   	<label for="WPPush_GA[ncenterLimit]"><?php echo __('wants to' ); ?></label>
					<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[wantsTo]"  value="<?php echo $varGA['wantsTo']; ?>"/>
		 </p>	
		<p>
    	   	<label for="WPPush_GA[sendYouNotifications]"><?php echo __('Send you notifications' ); ?></label>
					<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[sendYouNotifications]"  value="<?php echo $varGA['sendYouNotifications']; ?>"/>
		 </p>	
		<p>
    	   	<label for="WPPush_GA[sendYouNotifications]"><?php echo __('Allow Button' ); ?></label>
					<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[allowBtn]"  value="<?php echo $varGA['allowBtn']; ?>"/>
		 </p>	
		<p>
    	   	<label for="WPPush_GA[sendYouNotifications]"><?php echo __('Block Button' ); ?></label>
					<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[blockBtn]"  value="<?php echo $varGA['blockBtn']; ?>"/>
		 </p>	
			<p>
    	   	<label for="WPPush_GA[sendYouNotifications]"><?php echo __('Popup text' ); ?></label>
					<input type="text" id="WPPushGA_apiLogin" name="WPPush_ga[popAllowPush]"  value="<?php echo $varGA['popAllowPush']; ?>"/>
		 </p>			
	<?php submit_button(); ?>
   
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