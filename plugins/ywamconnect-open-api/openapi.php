<?php
/*
Plugin Name:    Ywam Connect Open API
Description:    Control the display logic of individual menu items.
Author:         Paulo Vieira
Version:        0.3
Author URI:     http://about.me/paulovieira

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 // Add a custom controller
add_filter('json_api_controllers', 'add_ywamconnectcontroller');

function add_ywamconnectcontroller($controllers) {
  // Corresponds to the class JSON_API_MyController_Controller
  $controllers = array('YwamConnect','YcFeed');
  return $controllers;
}

// Register the source file for JSON_API_Widgets_Controller
add_filter('json_api_ywamconnect_controller_path', 'ywamconnect_controller_path');

function ywamconnect_controller_path($default_path) {
  $dir = plugin_dir_path( __FILE__ );
  return $dir.'/controllers/ywamconnect.php';
}

add_filter('json_api_ycfeed_controller_path', 'ycfeed_controller_path');

function ycfeed_controller_path($default_path) {
  $dir = plugin_dir_path( __FILE__ );
  return $dir.'/controllers/ycfeed.php';
}
