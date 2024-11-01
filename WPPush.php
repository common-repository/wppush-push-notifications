<?php
/*
  Plugin Name: WPPush - Push notifications for your site Chrome & Safari
  Plugin URI: http://app-developers.biz/
  Description: Send push notifications via the web chrome, safari & firefox
  Version:0.5
  Author:App-Developers.biz
  Author URI: http://app-developers.biz/
  License: GPLv3
  Copyright: App-Developers.biz
*/
define('WPPUSH_APPNAME', 'wppush-push-notifications');
define('WPPUSH_APPNAME_FRIENDLY', 'WPPush');
define('AWPPUSH_APPNAME_FRIENDLY', 'WPPush');
define( 'WPPush_DIR',dirname( __FILE__ ) );
define( 'WPPush_DIR_URL',plugins_url('/',__FILE__) );
define('VIMEO_VIDEO_WPPUSH', 'WPPush');

define('WPPush_MAINURL', 'admin.php?page=WPPush');

class WPPushClass{


static private $class = null;

  	function __construct(){
	  	$this->init();
	  	add_action('init', array($this, 'init'), 1);
		//add_action('init', array($this, 'WPPushuseruuid'), 1);
		
		add_action( 'admin_menu',  array($this, 'register_WPPush_menu'),9 );	
		add_action( 'wp_enqueue_scripts', array($this, 'WPPush_includeCSSJS' ),99 );
		add_action('wp_footer', array($this, 'WPPush_add_my_script'),98);	
		add_action( 'admin_enqueue_scripts', array($this, 'WPPush_includeCSSJS_admin' ),1 );
		add_action( 'admin_init',  array($this, 'WPPushSettingValues') );
	  	//add_action( 'wp_footer', array($this, 'WPPush_inc_push_notes'), 99);
	}
	
	function init(){
		 
	}

/* ----  Admin Pages ------ */
	function WPPushHomepage(){
		include plugin_dir_path( __FILE__ ).'includes/admin/index_page.php';
	}
	function WPPushMoreDownloads(){
		include plugin_dir_path( __FILE__ ).'includes/admin/more_downloads.php';
	}
	function WPPushPN(){
		include plugin_dir_path( __FILE__ ).'includes/admin/push_notes.php';
	}
	function WPPushSettings(){
		include plugin_dir_path( __FILE__ ).'includes/admin/settings.php';
	}
	function WPPushVideos(){
		include plugin_dir_path( __FILE__ ).'includes/admin/videos.php';
	}
	function WPPushStats(){
		include plugin_dir_path( __FILE__ ).'includes/admin/stats.php';
	}
	function WPPushGetStarted(){
		include plugin_dir_path( __FILE__ ).'includes/admin/start.php';
	}
	
	
	
/* ----  /Admin Pages ------ */

/* --- Include Files to footer --- */
	
function WPPush_includeCSSJS(){

    wp_register_script( 'custom-script', plugins_url( '/assets/js/scripts.js', __FILE__ ), array( 'jquery', 'jquery-ui-core' ), '20120208', true );
    wp_register_script( 'custom-script-toastr', plugins_url( '/assets/js/jquery.amaran.min.js', __FILE__ ), array( 'jquery', 'jquery-ui-core' ) );
	
	wp_register_style( 'custom-script-css', plugins_url( '/assets/css/styles.css', __FILE__ ) );
	
	wp_register_style( 'custom-script-css-toast', plugins_url( '/assets/css/amaran.min.css', __FILE__ ) );
	wp_register_style( 'custom-script-css-toastani', plugins_url( '/assets/css/animate.min.css', __FILE__ ) );
	wp_register_script( 'wppush_custom_js_count',  plugins_url( '/assets/js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	wp_register_script( 'wppush_custom_js_cookies',  plugins_url( '/assets/js/jquery.cookie.js', __FILE__ ), array( 'jquery' ), '', true  );
	
   	wp_enqueue_script( 'custom-script-toastr' );
	wp_enqueue_script( 'wppush_custom_js_count' );
	wp_enqueue_script( 'wppush_custom_js_cookies' );
	wp_enqueue_script( 'custom-script' );
    wp_enqueue_style( 'custom-script-css' );
    wp_enqueue_style( 'custom-script-css-toast' );	
    wp_enqueue_style( 'custom-script-css-toastani' );	
}

		
function WPPush_includeCSSJS_admin($hook){
if (in_array($hook, $GLOBALS['wppush_my_page'])) {
	  wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
	$varGA = (array)get_option( 'WPPush_ga' );
	if(!isset($varGA['apiDomain'])) $varGA['apiDomain'] ='';
	
    wp_register_script( 'custom-script-admin', plugins_url( '/assets/js/scripts.admin.js', __FILE__ ), array( 'jquery', 'jquery-ui-core' ), '20120208', true );
   	wp_register_script( 'wordpush_custom_js_count',  plugins_url( '/assets/js/jquery.simplyCountable.js', __FILE__ ), array( 'jquery' ), '', true  );
	
	wp_enqueue_script( 'custom-script-admin' );
	wp_enqueue_script( 'wordpush_custom_js_count' );
	wp_register_style( 'custom-script-css-admin', plugins_url( '/assets/css/styles.admin.css', __FILE__ ) );
	
    wp_enqueue_style( 'custom-script-css-admin' );

	if($hook == 'wppush_page_WPPushStats'){
	wp_register_script( 'wordpush_custom_js_stats_google', 'https://www.google.com/jsapi',  '', true  );
	wp_enqueue_script( 'wordpush_custom_js_stats_google' );
			$apiDomain = get_option('wppush_domain');
	wp_register_script( 'wordpush_custom_js_stats',  '//push.wppush.co/wppush/stats.php?domain='.$apiDomain, '', true  );
	wp_enqueue_script( 'wordpush_custom_js_stats' );
	}
}
}
function WPPushuseruuid() {
  if (!isset($_COOKIE['wppushuuid'])) {
     $uuid = $this->WPPush_gen_uuid();
    if (count(explode('.', $cookie_domain)) > 2 && !is_numeric(str_replace('.', '', $cookie_domain))) {
      $actual_cookie_domain = $cookie_domain;
    }

  }
  return $uuid;
}
function WPPush_gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
/* -- Registering forms --*/
function WPPushSettingValues(){
	
	
add_settings_section('WPPush_main_ga', 'Main Settings', 'plugin_section_text', 'WPPush');
add_settings_field('WPPushGA', 'Theme Toolbar Color', 'WPPushColor_display','WPPush', 'WPPush_main_ga');
register_setting( 'WPPush_main_ga', 'WPPush_ga' );


}

public static function wordpush_options() {
        return get_option( 'WPPush_options' );
}		

	
function WPPush_add_my_script() { 
	
	$varGA = (array)get_option( 'WPPush_ga' );
	if(!isset($varGA['apiDomain'])) $varGA['apiDomain'] ='';			
	if(!wp_is_mobile()){
?>
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if gte IE 9]>
	<style type="text/css">
		.gradient {
			filter: none;
		}
			</style>
	<![endif]-->
<?php
$thedomain =	get_option('wppush_domain');
$varGA = (array)get_option( 'WPPush_ga' );
		
			
			if(!isset($varGA['wantsTo']) || $varGA['wantsTo'] == "") $varGA['wantsTo'] ='wants to';
			if(!isset($varGA['sendYouNotifications']) || $varGA['sendYouNotifications'] == "") $varGA['sendYouNotifications'] ='Send you notifications';
			if(!isset($varGA['allowBtn']) || $varGA['allowBtn'] == "") $varGA['allowBtn'] ='Allow';
			if(!isset($varGA['blockBtn']) || $varGA['blockBtn'] == "") $varGA['blockBtn'] ='Block';
			if(!isset($varGA['popAllowPush']) || $varGA['popAllowPush'] == "") $varGA['popAllowPush'] ='Allow '.$varGA['apiDomain'].' push notifications';
			
if($varGA['ncenter'] == "off"){
	
}else{
?>
<div class="bell-button" id="b-bell">
	<?php $response = wp_remote_get( 'http://push.wppush.co/wppush/listCount.php?limit='.$varGA['ncenterLimit'].'&uuid='.$_COOKIE['wppushuuid'].'&domain='.$thedomain );
		if( is_array($response) ) {
 	
 		echo $response['body']; // use the content
		}else{
			
			_e('No messages');
		}
		?>
<?php
								  }

	?>	
</div>

<div class="noti-panel" id="notipan">
	<center><h2 class="bxh2"><?php echo date(get_option('date_format')); ?></h2></center>
	
		<div class="noti-tabs" id="notitabs">
		<label class="tab-item" data-target-id="tabcontent-1"><?php _e('Notifications'); ?></label>
		<label class="tab-item" data-target-id="tabcontent-2"><?php _e('About'); ?></label>
	</div>
		
		
	
	<div class="b-x-panel" id="b-hide-noti-pan"></div>
	<div class="noti-list noti-tab-content" id="tabcontent-1">
		<?php 
	  $url = 'http://push.wppush.co/wppush/list.php?limit='.$varGA['ncenterLimit'].'&uuid='.$_COOKIE['wppushuuid'].'&domain='.$thedomain;
	$response = wp_remote_get($url );
		if( is_array($response) ) {
 	
 		echo $response['body']; // use the content
		}else{
			
			_e('No messages');
		}
		?>
	</div>
	<div class="noti-tab-content" id="tabcontent-2">
		<div class="container settingContainer">
			<p></p>
			<p>	<img src="<?php echo WPPush_DIR_URL; ?>/assets/images/logoFullWhite.png"></p>
			<p><a href="http://app-developers.biz/"><?php _e('Created with WPPush for wordpress by App-developers'); ?></a></p>
		</div>
	</div>
	
	
	
	<div class="gradient b-clear-all-noti">
		
		<span id="b-noti-clear-all"><?php _e('Clear all'); ?></span>
	</div>
</div>


<?php 
	}else{
		
		?>
<style>
.amaran.tumblr {
  
    left: 0px!important;
}
</style>
<?php
		
	}
	if(!isset($_COOKIE['wppushuuid'])){
		//echo "cooking up";
	$uuid =	$this->WPPushuseruuid();
		
			
 	setcookie('wppushuuid', $uuid, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN, false);
 	$_COOKIE['wppushuuid'] = $uuid;
	}
?>
<script>
jQuery( document ).ready(function() {
	
	if(jQuery.cookie('wppushuuid') == null){
	   var uuid = generateUUID();
		//alert('UUID ' + uuid);
		jQuery.cookie('wppushuuid', uuid, { expires: 365 });
		
	   }
	var ua = window.navigator.userAgent,
		safari = ua.indexOf ( "Safari" ),
		chrome = ua.indexOf ( "Chrome" ),
		version = ua.substring(0,safari).substring(ua.substring(0,safari).lastIndexOf("/")+1);
//alert(chrome);
	if(chrome > -1) {
		//alert("Should be chrome")
		var urlPopup = '/pushChrome';
	}
	else if(safari > -1) {
		//alert("Should be safari")
		var urlPopup = '';
	}
	else {
		
	}
	
	
<?php 
	
	
	$isPopup = $this->isWPPushPopup();
	if($isPopup == false):
	?>	
	if(safari > -1 || chrome > -1){
    jQuery.amaran({
        'content'   :{
           title: '<?php bloginfo('name'); echo $varGA['wantsTo']; ?> ', 
           message:'<?php echo $varGA['sendYouNotifications']; ?> <br><button id="toastbtn" class="toastbtn"><?php echo $varGA['blockBtn']; ?></button><button id="toastbtnActive" class="toastbtnActive"><?php echo $varGA['allowBtn']; ?></button>'
        },
        'position'          :'top left',
        'theme'             :'tumblr',
        'sticky'            :true,
        'closeButton'       :false,
        'closeOnClick'      :false
    });
	}
<?php
	endif;
	
	$apiDomain = get_option('wppush_domain');
	?>

jQuery('#toastbtnActive').click(function(e) {
			
	var subdomaine = '<?php echo $apiDomain; ?>'
			 var e = void 0 != window.screenLeft ? window.screenLeft : screen.left,
                i = void 0 != window.screenTop ? window.screenTop : screen.top,
                t = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width,
                n = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height,
                a = 600,
                o = 350,
                r = t / 2 - a / 2 + e,
                p = n / 2 - o / 2 + i,
                s = window.open("https://"+ subdomaine +".wppush.co"+urlPopup+"/?siteUUID=" + jQuery.cookie('wppushuuid') + "&domain=" + subdomaine + "&txt=<?php echo urlencode($varGA['popAllowPush']);?>", "_blank", "scrollbars=yes, width=" + a + ", height=" + o + ", top=" + p + ", left=" + r);
            s.focus();
		
		jQuery.amaran.close();
		setCookieSuccess();
		});

	jQuery('#toastbtn').click(function(e) {
			
		jQuery.amaran.close();
		jQuery.cookie('hidePopwppush', '1', { expires: 1 });
	
		});
	
});
	function setCookieSuccess(){
		jQuery.cookie('hidePopwppush', '10', { expires: 10 });
	}
	
	function generateUUID() {
    var d = new Date().getTime();
    var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = (d + Math.random()*16)%16 | 0;
        d = Math.floor(d/16);
        return (c=='x' ? r : (r&0x3|0x8)).toString(16);
    });
    return uuid;
	};
</script>
<?php
						 }


public function isWPPushPopup(){

	if (!isset($_COOKIE['hidePopwppush'])) {
		return false;
	  	}
	else{
		return true;
	}
	
}
function register_WPPush_menu(){
		
		$page_title = "WPPush";
		$menu_title = "WPPush";
		$capability = 'activate_plugins';
		$menu_slug  = "WPPush";
		$function  	= "WPPushHomepage";
		
		$GLOBALS['wppush_my_page'] = array();
		
		if(get_option( 'wppush_firstCreation' ) == ""){ 
		$GLOBALS['wppush_my_page'][] = add_menu_page( __('Getting Started'), $menu_title, $capability, $menu_slug, array($this, 'WPPushGetStarted'), plugins_url( WPPUSH_APPNAME.'/assets/images/app20x20.png' ), 99 ); 
		//$GLOBALS['my_page'][] = add_submenu_page( $menu_slug, __('Quick install'), __('Quick Install'), $capability, 'WPPushGetStarted', array($this, 'WPPushGetStarted') );	
	   }else{
		$GLOBALS['wppush_my_page'][] = add_menu_page( __('Getting Started'), $menu_title, $capability, $menu_slug, array($this, $function), plugins_url( WPPUSH_APPNAME.'/assets/images/app20x20.png' ), 99 ); 
		$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Stats'), __('Stats'), $capability, 'WPPushStats', array($this, 'WPPushStats') );	
		$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Send a Push'), __('Send a Push'), $capability, 'WPPushPN', array($this, 'WPPushPN') );
		//$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Marketing Gear'), __('Marketing Gear'), $capability, 'WPPushMarketing', array($this, 'WPPushMarketing') );
		//$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Tell a friend'), __('Tell a friend'), $capability, 'WPPushMoreDownloads', array($this, 'WPPushMoreDownloads') );
		//$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Video Tutorials'), __('Video Tutorials'), $capability, 'WPPushVideos', array($this, 'WPPushVideos') );
		$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Settings'), __('Settings'), $capability, 'WPPushSettings', array($this, 'WPPushSettings') );
		//$GLOBALS['wppush_my_page'][] = add_submenu_page( $menu_slug, __('Upgrade to Pro'), '<span style="color: #ff5a00;">Upgrade to Pro</span>', $capability, 'WPPushGoPro', array($this, 'WPPushGoPro') );
		}
		
	}
/* ----  /Admin Menu ------ */



}//END CLASS

	function WPPushClass(){
		global $WPPushClass;

		if( !isset($WPPushClass) ){
			$WPPushClass = new WPPushClass();
		}

		return $WPPushClass;
	}


	if (class_exists("WPPushClass")){
		$WPPush_mobile = new WPPushClass();
	  // Activation
	  //register_activation_hook(__FILE__, array(&$WPPush_mobile, 'WPPush_activatePlugin'));
	  //register_deactivation_hook(__FILE__, array(&$WPPush_mobile, 'WPPush_deactivatePlugin'));
	}

