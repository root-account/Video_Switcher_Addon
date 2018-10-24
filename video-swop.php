<?php
   /*
   Plugin Name: Aglet Video Swop
   Plugin URI: http://aglet.com
   Description: a plugin to swop between to videos seemlessly
   Version: 1.2
   Author: Team Aglet
   Author URI: http://aglet.com
   License: GPL2
   */


wp_enqueue_style('video_styles', plugin_dir_url( __FILE__ ) . 'css/video_styles.css' );
//wp_enqueue_style('video-script', plugin_dir_url( __FILE__ ) . 'js/video-script.js' );


function Zumper_widget_enqueue_script()
{   
    wp_enqueue_script( 'my_custom_script', plugin_dir_url( __FILE__ ) . 'js/video-script.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'Zumper_widget_enqueue_script');



function aglet_video_link_func( $atts ) {
extract(shortcode_atts(array(
"vid1_path" => '',
"vid2_path" => '',
"el_class" =>''
),$atts));


// if(!empty($image_url)) {

// if(!preg_match('/^\d+$/',$image_url)){

// $image_url = $image_url;

// } else {
// $image_src = wp_get_attachment_image_src($image_url, 'full');

// $image_url = $image_src[0];
// }

// } else 
// $image_url = vc_asset_url( 'images/before.jpg' );



$end_content = ' 



	<div class="home-vid">
			
		<span class="home-play-button dont_show"id="home_play_btn">
			<i class="fa fa-play"> </i>
		</span>

		<div class="videoContainer  first-time-video dont_show">
			<video class="" muted id="first-time-video" poster="http://10thstreet.agletonline.com/wp-content/uploads/2018/02/10th-street-media-intro-video.jpg" loop>
			  <source src="'.$vid1_path.'" type="video/mp4">
			  Your browser does not support HTML5 video.
			</video>
		</div>

		<div class="videoContainer second-time-video">
			<video id="second-time-video" poster="http://10thstreet.agletonline.com/wp-content/uploads/2018/02/10th-street-media-intro-video.jpg" loop>
			  <source src="'.$vid2_path.'" type="video/mp4">
			  Your browser does not support HTML5 video.
			</video>

			<button class="mute-video"></button>
		</div>

		<span class="scroll_down dont_show">

			<a href="#row-after-image"><i class="material-icons">arrow_drop_down</i></a>
			
		</span>

	</div>



'; 
return $end_content;  
}




add_shortcode( 'aglet_video_link', 'aglet_video_link_func');

add_action( 'vc_before_init', 'video_swop_integrateWithVC' );


function video_swop_integrateWithVC() {
vc_map( array(
"name" => __("Aglet Video Swop", "uncode-js_composer"),
"base" => "aglet_video_link",
"class" => "aglet_video_link",
//"icon" => "icon-wpb-single-image",
"category" => __('Aglet', 'uncode-js_composer'),
"description" => __('Swaps videos', 'uncode-js_composer'),
"params" => array(

		array(
		"type" => "textfield",
		"heading" => __("Video 1 Path", "uncode-js_composer"),
		"param_name" => "vid1_path",
		"value" => "",
		"description" => __("Enter the path to the first video.", "uncode-js_composer")
		),
		array(
		"type" => "textfield",
		"heading" => __("Video 2 Path", "uncode-js_composer"),
		"param_name" => "vid2_path",
		"value" => "",
		"description" => __("Enter the path to the second video", "uncode-js_composer")
		),
		array(
		"type" => "textfield",
		"heading" => __("Extra class name", "uncode-js_composer"),
		"param_name" => "el_class",
		"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "uncode-js_composer")
)
)
));

}

add_action("wp_head", "aglet_video_link_func");


