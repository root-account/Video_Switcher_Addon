jQuery(document).ready(function(){


		var firstVideo = document.getElementById("first-time-video"); 
		var secondVideo = document.getElementById("second-time-video"); 

		firstVideo.play(); 


		jQuery(".home-play-button").on('click', function(){

			localStorage.setItem('landing_video_view','video_is_pressed');

	    	jQuery(".menu-wrapper").removeClass("site_inactive");
	    	jQuery(".menu-wrapper").addClass("site_active");

	    	jQuery(".menu-wrapper").css("cssText", "opacity: 1 !important; transition: opacity 0.9s ease;");


			jQuery('.first-time-video').addClass("disable-video");
			jQuery('.second-time-video').addClass("active-video");

			jQuery('.home-play-button').css("display", "none");
			jQuery('.home-play-button').addClass("dont_show");

			jQuery('.scroll_down').removeClass("dont_show");

			jQuery("body").css("cssText", "overflow: show !important;");
			

    		secondVideo.play(); 

    		firstVideo.stop(); 

		});



	//Check if user already played the video before
	if (localStorage.getItem('landing_video_view') !== 'video_is_pressed') {

		jQuery(".menu-wrapper").addClass("site_inactive");
		jQuery("body").css("cssText", "overflow: hidden !important;");

		jQuery('.home-play-button').removeClass("dont_show");
		jQuery('.first-time-video').removeClass("dont_show");

	    sessionStorage.alreadyClicked = 1;

	}else{

		var secondVideo = document.getElementById("second-time-video");
		localStorage.setItem('landing_video_view','video_is_pressed');
			jQuery( ".first-time-video" ).remove();
			jQuery( ".home-play-button" ).remove();


	    	jQuery(".menu-wrapper").removeClass("site_inactive");

	    	jQuery(".menu-wrapper").addClass("site_active");

	    	jQuery('.scroll_down').removeClass("dont_show");


			//jQuery('.first-time-video').addClass("disable-video");
			jQuery('.second-time-video').addClass("active-video");

			jQuery("body").css("cssText", "overflow: show !important;");

		secondVideo.play(); 

	}



jQuery("video").prop('muted', false);

jQuery(".mute-video").click(function () {


    if (!jQuery("video").prop('muted')) {
        jQuery("video").prop('muted', true);
        jQuery(this).addClass('unmute-video');

    } else {
        
        jQuery("video").prop('muted', false);
        jQuery(this).removeClass('unmute-video');
    }



    console.log(jQuery("video").prop('muted'))
});



});

