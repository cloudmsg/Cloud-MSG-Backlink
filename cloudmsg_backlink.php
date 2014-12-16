<?php
/**
 * Plugin Name: Cloud MSG Backlink
 * Plugin URI: https://www.github.com/cloudmsg/Cloud-MSG-Backlink
 * Description: This plugin puts "Powered by CloudMSG in the footer - backlink"
 * Version: 1.1.1
 * Author: Karl Hepler
 * Author URI: http://www.karlhepler.com
 * Text Domain: cloudmsg
 * Network: true
 * License: GPL2
 * GitHub Plugin URI: cloudmsg/Cloud-MSG-Backlink
 */

/*  Copyright 2014  Karl Hepler  (email : karl.hepler@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function powered_by_cloudmsg() {
  // enqueue the style
  wp_enqueue_style( 'cloudmsg_backlink-style', plugins_url('style.css', __FILE__) );

  ?>
  <div class="cloudmsg-backlink"><p>Powered By <a href="http://www.cloudmsg.com" target="_blank">Cloud Managed Services Group, Inc.</a></p></div>
  <?php
}
add_action('wp_footer', 'powered_by_cloudmsg');
?>