<?php
/**
 * Plugin Name: Cloud MSG Backlink Widget
 * Plugin URI: http://www.cloudmsg.com
 * Description: This plugin is a widget that shows a backlink to cloudmsg.com
 * Version: 1.0
 * Author: Karl Hepler
 * Author URI: http://www.karlhepler.com
 * Text Domain: cloudmsg
 * Network: true
 * License: GPL2
 * GitHub Plugin URI: oldtimeguitarguy/Cloud-MSG-Backlink
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

class cloudmsg_backlink extends WP_Widget {

  // constructor
  function __construct() {
    $widget_ops = array('classname' => 'cloudmsg-backlink-widget', 'description' => __('This plugin is a widget that shows a backlink to cloudmsg.com', 'cloudmsg_backlink'));
    parent::WP_Widget(false, $name = __('Cloud MSG Backlink Widget', 'cloudmsg_backlink'), $widget_ops );
  }

  // widget form creation
  function form($instance) {  
    if ($instance) {
      $select = esc_attr($instance['select']);
    }
    else {
      $select = '';
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('select'); ?>"><?php _e('Select', 'cloudmsg_backlink'); ?></label>
      <select name="<?php echo $this->get_field_name('select'); ?>" id="<?php echo $this->get_field_id('select'); ?>" class="widefat">
        <?php
        $options = array('Image', 'Text');
        foreach ($options as $option) {
          echo '<option value="' . $option . '" id="' . $option . '"', $select == $option ? ' selected="selected"' : '', '>', $option, '</option>';
        }
        ?>
      </select>
    </p>
    <?php
  }

  // widget update
  function update($new_instance, $old_instance) {
    $instance = $old_instance;

    $instance['select'] = strip_tags($new_instance['select']);
    return $instance;
  }

  // widget display
  function widget($args, $instance) {
    // enqueue the style
    wp_enqueue_style( 'cloudmsg_backlink-style', plugins_url('style.css', __FILE__) );

    extract($args);
    echo $before_widget.'<div>';

    switch ($instance['select']) {
      case 'Image':
        ?><a alt="Cloud Managed Services Group, Inc." href="http://www.cloudmsg.com" target="_blank"><img src="<?php echo plugins_url('logo.png', __FILE__); ?>" alt="Cloud Managed Services Group, Inc."></a><?php
        break;

      case 'Text':
      default:
        ?><p>Powered by <a alt="Cloud Managed Services Group, Inc." href="http://www.cloudmsg.com" target="_blank">Cloud Managed Services Group, Inc.</a></p><?php
        break;
    }

    echo '</div>'.$after_widget;
  }
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("cloudmsg_backlink");'));