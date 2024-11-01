<?php
if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
//delete_option( 'wppush_firstCreation' );
include WPPush_DIR.'/includes/config.php';	

$regOptionsGet = get_option('WPPush_register_site');
if($regOptionsGet == ''){
	$apiSite = base64_encode(get_site_url());
	update_option( 'WPPush_register_site', '1' );
	
}

?>


<div class="wrap">
   
   <div class="WPPushheader"><a href="<?php echo WPPush_MAINURL; ?>" class="WPPushlogo"><img style="  width: 100%;max-width:250px" src="<?php echo plugin_dir_url(WPPUSH_APPNAME.'/assets/images/logoO1.png', __FILE__); ?>logoO1.png"></a> 
	    <div style=";">
		    <?php

				/* After accepting the t&c this registers users blog so we can display app and send the android version automatically via email */
		      	$email64 = base64_encode(get_bloginfo('admin_email'));
				$url64 = base64_encode(get_bloginfo('url'));

		      if(get_option( 'WPPush_firstVisit' ) == ""){
			  		echo '<img src="http://52.27.101.150/mobrock/app/activatePixelWPPush.php?user='.$email64.'&url='.$url64.'&longUrl=&format=json">';
			 		//update_option( 'WPPush_ga', array('mobilesite' => 'on'));
			 	}
		      else{
					echo '<img src="http://52.27.101.150/mobrock/app/activatePixelWPPush.php?user='.$email64.'&url='.$url64.'&longUrl=&format=json&noemail=yes">';
		 		}
		   
		   ?>
		
		  
	   
	   </div>
	</div>
         <div id="dashicons-admin-plugins" class="icon32"></div>
   <?php
	$varGA = (array)get_option( 'WPPush_ga' );
	if(!isset($varGA['chatHide'])) $varGA['chatHide'] ='';
	if($varGA['chatHide']== ''){
	  ?>
	<!--Start of Zopim Live Chat Script-->

<!--End of Zopim Live Chat Script-->
	<?php
	
	
	}
	?>