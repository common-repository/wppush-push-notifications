<?php

include trailingslashit( plugin_dir_path( __FILE__ ) ) . 'header.php';
?>

	
	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span><?php echo __( 'Stats ').WPPUSH_APPNAME; ?></span></h3>

						<div class="inside">
							<div id="columnchart_material"></div>
							
							<div id="stats-nuggets">
		<ul>
			<li><h3>Today</h3><span  id="totalSubscribersToday">-</span> subscribers</li><li id="bestever"><h3>All time</h3><span  id="totalSubscribers">-</span> <em>subscribers</em></a></li><li style=""><h3>Per OS</h3><strong><span id="totalSubscribersChrome">-</span> <em>Chrome</em></strong><strong><span  id="totalSubscribersSafari">-</span> <em>Safari</em></strong><strong><span  id="totalSubscribersFirefox">-</span> <em>Firefox</em></strong></li>		</ul>
	</div>
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