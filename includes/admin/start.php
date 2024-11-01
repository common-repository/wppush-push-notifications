<?php

if(isset($_GET['varWPPush'])){
	
	update_option( 'wppush_domain', $_GET['varWPPush']);
	update_option( 'wppush_firstCreation', '1');
	include plugin_dir_path( __FILE__ ).'fin.php';
	//wp_redirect( '' ); 
	exit;
}
	
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';

	$activate = '';
 	$url = "http://52.27.101.150/mobrock/app/activateJson.php";
	$activate = json_decode(wp_remote_retrieve_body(wp_remote_get($url)),true);	



?>
	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-1">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox postboxLogin">

						

						<div class="inside">
							<form action="#" method="post" id="fromCreateWPPush">
						<center><h1><?php _e('Welcome to WPPush');?></h1>
							<p>
								
							</p>
						<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<div class="logo"></div>
<div class="login-block">
 <img style="  width: 100%;max-width:250px" src="<?php echo plugin_dir_url(WPPUSH_APPNAME.'/assets/images/logoO1.png', __FILE__); ?>logoO1.png">
							
    <input type="text" value="" placeholder="<?php _e('Email Address'); ?>" id="email" name="bcc"/>
	<input type="text" value="" placeholder="<?php _e('Choose a Username'); ?>" id="username" name="domain"/><div id="user-result"></div>
    <input type="password" value="" placeholder="<?php _e('Password'); ?>" id="password" name="password"/>
	
	
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

	?>
	
	<input type="hidden" value="<?php echo $apiKey; ?>" id="apiKey" name="apiKey"/>
	<input type="hidden" value="<?php echo $apiLogin; ?>" id="apiLogin" name="apiLogin" />
	
	
	<input type="text" value="<?php bloginfo('url'); ?>" placeholder="Site URL" id="wppushurl"  name="wppushurl" readonly />
    <button id="createAccountWPPush"><?php _e('Create my free account!'); ?></button>
	<div id="createAccountWPPushLoading" style="display:none"><img src="https://push.wppush.co/wppush/img/ajax-loader.gif" /> <?php _e('Loading please wait...'); ?></div>
<?php _e('All fields are required'); ?>
</div>	
	
							</center>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->


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
	
	
.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #8CC63E;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 20px;
    outline: none;
}
/*
.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}
*/
.login-block input:active, .login-block input:focus {
    border: 1px solid #8CC63E;
}
.login-block button {
    width: 100%;
    height: 40px;
    background: #8CC63E;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #076C40;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #076C40;
	border: 1px solid #8CC63E;
}
.postboxLogin{
	    background-color: transparent;
    border: 0px solid #e5e5e5;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
    var x_timer;    
    jQuery("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = jQuery(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 

function check_username_ajax(username){
    jQuery("#user-result").html('<img src="https://push.wppush.co/wppush/img/ajax-loader.gif" />');
    jQuery.post('http://push.wppush.co/wppush/username.php', {'username':username}, function(data) {
      jQuery("#user-result").html(data);
    });
}
});
</script>
<?php
include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'footer.php';
?>