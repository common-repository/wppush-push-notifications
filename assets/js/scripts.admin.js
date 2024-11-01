(function($) {
	if (!$) {
		return;
	}
	var notShow = 0;
	jQuery(document).ready(function() {


		/* Scripts */

		// Add Color Picker 
		//$('.cpa-color-picker').wpColorPicker();
		var i = "";
		$('.advancedColors').click(function(e) {
			e.preventDefault();
			$(".advancedColorsDiv").slideToggle();
		});
		
		
										
		$('#createAccountWPPush').click(function(){
			
			if($("#email").val() === '' || $("#username").val() ==='' || $("#password").val() ===''){
				alert('Please fill out all the fields');
				return false;
			}
			else{
				
			$("#wppushurl").attr("readonly", false);
			$('#createAccountWPPush').hide();
			$('#createAccountWPPushLoading').show();
			
			var datastring = $("#fromCreateWPPush").serialize();
			$.ajax({
            type: "POST",
            url: "http://push.wppush.co/wppush/activate.php",
            data: datastring,
            dataType: "json",
            success: function(data) {
                //var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
                // do what ever you want with the server response
				window.location.replace("admin.php?page=WPPush&varWPPush=" + $('#username').val());
                  //alert('done');
            },
            error: function(){
                  //alert('error handing here');
				$('#createAccountWPPush').show();
				$('#createAccountWPPushLoading').hide();
            }
        });
				return false;
			}
			   });
			
		$('#upload_icon_button').click(function() {
			tb_show('Upload a icon', 'media-upload.php?TB_iframe=true', false);
			i = "icon";
			return false;
		});
		
		
		
		window.original_send_to_editor = window.send_to_editor;
		//After uploading call this script
		window.send_to_editor = function(html) {
			var image_url = $('img', html).attr('src');
			// alert(image_url);

			if (i == "icon") {
				$('#icon_url').attr('src', image_url);
				$('#WPPush_icon').val(image_url);
			} else {
				window.original_send_to_editor(html);
			}


			tb_remove();
		};


		$('#txtCount').simplyCountable({
			counter: '#counter',
			countType: 'characters ',
			maxCount: 105,
			countDirection: 'down'
		});

		$("#sendPushWPPush").click(function(e) {
			var apikey = $('#apiKey').val();
			var apiLogin = $('#apiLogin').val();
			var domain = $('#domain').val();
			var fullUrl = 'https://push.wppush.co/wppush/sendPN.php?domain=' + domain + '&apiKey=' + apikey + '&apiLogin=' + apiLogin + '&message=' + $('#txtCount').val() + '&title='+ $('#title').val()+ '&url='+ $('#url').val();
			//alert(fullUrl);
			if (apikey === '' || apiLogin === '' || $('#txtCount').val() === '') {

				alert("There seems to be a problem. Please check you API codes and try again.");

			} else {
				$.ajax({
					type: 'GET',
					url: fullUrl,
					dataType: 'json',
					success: function(jsonData) {
						//alert(jsonData['pnTrue']);
						if (jsonData.pnSent == 'true') {
							alert("Your message was sent! Depending on the number of subscribers, sending may take a from a few minutes to a few hours.");

						} else {
							alert("Your message was sent! Depending on the number of subscribers, sending may take a from a few minutes to a few hours.");

						}
					},
					error: function() {
						alert("Your message was sent! Depending on the number of subscribers, sending may take a from a few minutes to a few hours.");
					}
				});
			}
		}); 

	});






})(jQuery);


