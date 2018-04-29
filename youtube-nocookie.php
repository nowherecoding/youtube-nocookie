<?php

/*
  Plugin Name: YouTube-Nocookie
  Plugin URI: https://github.com/nowherecoding/youtube-nocookie/
  Description: Embed YouTube videos in compliance with privacy
  Author: NowhereCoding
  Author URI: https://github.com/nowherecoding/
  Version: 1.0.0
  License: http://www.gnu.org/licenses/gpl-2.0.html


  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along
  with this program; if not, write to the Free Software Foundation, Inc.,
  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

/**
 * Modify oEmbeds to use YouTube's privacy-enhanced mode
 * When you turn on privacy-enhanced mode, YouTube won't store information about visitors on your website unless they play the video
 *
 * @param $output
 * @param $url
 *
 * @return string
 */
function youtube_nocookie( $source, $url = null, $attr, $post_ID )
{

    // Search for youtu to return true for youtube.com and youtu.be URLs
    if ( strpos( $url, 'youtu' ) ) {
        $output = preg_replace( '/youtube\.com/s', 'youtube-nocookie.com', $source );
    }

    return $output;
}

add_filter( 'embed_oembed_html', 'youtube_nocookie', 10, 4 );
