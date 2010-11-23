<?php



/*


Plugin Name: Live Political Popularity Comparison Chart Generator Widget

Version: 1.0.1


Description:Compare politicians in a side by side contest where Google's search statistics show who is more popular. 
Not many people know that Google tracks what people are searching for and the volume of those searches. 
It is easy to compare politicians in a visual way with this graph generator and see who is more popular without resorting to votes. 
You will be pretty shocked at who is more popular then who, besides being thoroughly entertained. 
This tool will be something your political audience will appreciate using and playing around with. 
Install it and see your web site's interaction sky rocket!

Author: Director of Personal Money Store: David Johnston
Author URI: http://wordpress.org/support/profile/personalmoneystore/
Plugin URI: http://personalmoneystore.com/moneyblog/live-political-popularity-comparison-chart-generator-widget/

*/


  /*
   Copyright 2010  Director of Personal Money Store: David Johnston  (email : webmaster@personalmoneystore.com)
   The image is compiled by Google and this gadget author has no control over what is displayed or the accuracy of it.

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


global $wp_version;


	$exit_msg = 'WP Political Popularity Widget requires WordPress 2.6 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

	if (version_compare($wp_version, "2.6", "<")) {

      exit($exit_msg);

	}

$wp_ppw_plugin_url =  trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ));
function WPPpw_WidgetControl()
{

	// get saved options
	$options = get_option('wp_ppw');
	// handle user input
	if ($_POST["ppw_submit"]) {

		// retireve ppw title from the request

		$options['ppw_title'] = strip_tags(stripslashes($_POST["ppw_title"]));

		$options['first_name'] = strip_tags(stripslashes($_POST["first_name"]));

		$options['second_name'] = strip_tags(stripslashes($_POST["second_name"]));

		$options['enable_checkbox'] = strip_tags(stripslashes($_POST["enable_checkbox"]));

 		// update the options to database

        update_option('wp_ppw', $options);

	}

	$title = $options['ppw_title'];

	$first_name = $options['first_name'];

	$second_name = $options['second_name'];

	$enable_checkbox = $options['enable_checkbox'];

	// print out the widget control, links to widget control    

	include('wp-ppw-widget-control.php');

}  

function WPPpw_Widget($args = array())

{ 
	// extract the parameters
      extract($args);

	// get our options
	$options = get_option('wp_ppw');
	$title = $options['ppw_title'];
	$first_name = $options['first_name'];
	$second_name = $options['second_name'];
	$enable_checkbox = $options['enable_checkbox'];
	// print the theme compatibility code
	echo $before_widget;

	echo $before_title . $title . $after_title;

	// include our widget
	include('wp-ppw-widget.php');
	echo $after_widget;

}

//loads from the start
function WPPpw_Init()
{

	// register widget
	register_sidebar_widget('WP Political Popularity Widget', 'WPPpw_Widget');
	// register widget control
	register_widget_control('WP Political Popularity Widget', 'WPPpw_WidgetControl');    
}
add_action('init', 'WPPpw_Init');
//links to css
add_action('wp_head', 'WPPpw_HeadAction');
function WPPpw_HeadAction()
{
	global $wp_ppw_plugin_url;     
    echo '<link rel="stylesheet" href="' . $wp_ppw_plugin_url . '/wp-ppw.css" type="text/css" />';

}

//links to javascript

add_action('wp_print_scripts', 'WPPpw_ScriptsAction');

function WPPpw_ScriptsAction()

{

	if (!is_admin()) {
	global $wp_ppw_plugin_url;
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_script('wp_ppw_script', $wp_ppw_plugin_url . '/wp-ppw.js', array('jquery', 'jquery-form'));
	}

}

?>