<?php if( ! defined('ABSPATH') ) { header('Status: 403 Forbidden'); header('HTTP/1.1 403 Forbidden'); exit(); }
/**
* @link             http://katalystvideoplus.com
* @since            2.0.0
* @package          MyCRED_For_KVP
*
* @wordpress-plugin
* Plugin Name:      myCRED Video for KVP
* Plugin URI:       http://katalystvideoplus.com/
* Description:      Automatically replace Katalyst Video Plus video embed with myCRED video to allow points to be awarded for users who view the video.
* Version:          1.0.0
* Author:           Keiser Media Group
* Author URI:       http://keisermedia.com/
* License:          GPL-2.0+
* License URI:      http://www.gnu.org/licenses/gpl-2.0.txt
* License:			GPL3
*
*	Copyright 2014  keisermedia.com  (email: support@keisermedia.com)
*
*	This program is free software: you can redistribute it and/or modify
*   it under the terms of the GNU General Public License as published by
*   the Free Software Foundation, either version 3 of the License, or
*   (at your option) any later version.
*
*   This program is distributed in the hope that it will be useful,
*   but WITHOUT ANY WARRANTY; without even the implied warranty of
*   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*   GNU General Public License for more details.
*
*   You should have received a copy of the GNU General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
**/

function kvp_mycred_video_embed( $content, $atts ) {
	
	if( !shortcode_exists( 'mycred_video' ) || !isset( $atts['video_id'] ) )
		return $content;
	
	$query = 'id="' . $atts['video_id'] . '"';
	
	if( isset($atts['height']) )
		$query .= ' height="' . $atts['height'] . '"';
	
	if( isset($atts['width']) )
		$query .= ' width="' . $atts['width'] . '"';
	
	return do_shortcode( '[mycred_video ' . $query . ']' );
	
}

add_filter( 'kvp_youtube_video_embed', 'kvp_mycred_video_embed', 15, 2 );
add_filter( 'kvp_vimeo_video_embed', 'kvp_mycred_video_embed', 15, 2 );