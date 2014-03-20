<?php
/**
 * This file is home to the code that has
 * been deprecated/replaced by other code.
 *
 * It serves as a compatibility mechanism.
 *
 * @package Genesis
 **/

/**
 * @deprecated in 0.1.3
 *
 **/
function get_custom_field($field, $echo = TRUE) {
	if($echo)
		genesis_custom_field($field);
	else
		return genesis_get_custom_field($field);
}

/**
 * @deprecated in 0.1.3
 *
 **/
function sp_get_option($key, $setting = null) {
	return genesis_get_option($key, $setting);
}
function sp_option($key, $setting = null) {
	genesis_option($key, $settings);
}

/**
 * @deprecated in 0.1.6
 *
 */
function sp_get_image_id($num = 0) {
	return genesis_get_image_id($num);
}
function sp_get_image($format = 'html', $size = 'full', $class = null, $num = 0, $w = FALSE, $h = FALSE, $zc = 1) {
	$args = array('format' => $format, 'size' => $size, 'class' => $class, 'num' => $num, 'w' => $w, 'h' => $h, 'zc' => $zc);
	return genesis_get_image($args);
}
function sp_image($format = 'html', $size = 'full', $class= null, $num = 0, $w = FALSE, $h = FALSE, $zc = 1) {
	$args = array('format' => $format, 'size' => $size, 'class' => $class, 'num' => $num, 'w' => $w, 'h' => $h, 'zc' => $zc);
	genesis_image($args);
}

/**
 * @deprecated in 0.1.6
 *
 */
function sp_page_checklist($name = '', $selected = array()) {
	genesis_page_checklist($name, $selected);
}
function sp_category_checklist($name = '', $selected = array()) {
	genesis_category_checklist($name, $selected);
}

/**
 * @deprecated in 0.1.6
 *
 */
function sp_breadcrumb($home, $sep, $prefix = '', $suffix = '', $display = true) {
	if($display)
	genesis_breadcrumb($home, $sep, $prefix, $suffix, $display);
	else
	return genesis_breadcrumb($home, $sep, $prefix, $suffix, $display);
}

/**
 * @deprecated in 0.1.7
 *
 */
function genesis_get_timthumb($src = null, $w = null, $h = null, $zc = null) {
	return genesis_get_image(array('format' => 'src', 'size' => array($w, $h)));
}
function genesis_timthumb($src = null, $w = null, $h = null, $zc = null) {
	genesis_image(array('format' => 'src', 'size' => array($w, $h)));
}