<?php
/**
 * Plugin Name: Modern Font Stacks for WP
 * Plugin URI: https://csaba.blog/modern-font-stacks-in-wordpress
 * Description: This lightweight plugin integrates the Modern Font Stacks project into WordPress (block) themes. These are system font stacks organized by typeface classification for every modern OS. The fastest fonts available. No downloading, no layout shifts, no flashes — just instant renders.
 * Requires at least: 6.2
 * Requires PHP: 5.6
 * Version: 1.0
 * Author: LittleBigThings
 * Author URI: https://littlebigthings.be
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: mfswp
 *
 * @package mfswp
 */

/**
 * Add fonts to available fonts in themes with a theme_json file
 *
 * @since 1.0
 * 
 * @param WP_Theme_JSON_Data $theme_json The original theme JSON data.
 * @return WP_Theme_JSON_Data The modified theme JSON data.
 */
function mfswp_add_modern_font_stacks( $theme_json ) {
	
	// get current theme.json data
	$current_data = $theme_json->get_data();

	// bail if theme.json version is not version 2 (TODO: maybe show an admin notice that the plugin does not work?)
	if ( ! isset( $current_data['version'] ) || $current_data['version'] !== 2 ) {
		return $theme_json;
	}

	// merge current font families with the modern font stacks
	$font_families = array_merge( $current_data['settings']['typography']['fontFamilies'], mfswp_get_modern_font_stacks() );
	
	// add font families to json structure
	$new_data = array (
		'version'  => 2,
		'settings' => array (
			'typography' => array (
				'fontFamilies' => $font_families,
			),
		),
	);

	return $theme_json->update_with( $new_data );
}

// for the filter to work properly, it must be run after theme setup
function mfswp_apply_theme_json_theme_filter() {

	// check to make sure the theme has a theme.json file
	if ( wp_theme_has_theme_json() ) {
		add_filter( 'wp_theme_json_data_theme', 'mfswp_add_modern_font_stacks' );
	}
}
add_action( 'after_setup_theme', 'mfswp_apply_theme_json_theme_filter' );

/**
 * Modern Font Stacks from https://modernfontstacks.com or https://github.com/system-fonts/modern-font-stacks
 *
 * @license CC0 1.0 Universal https://creativecommons.org/share-your-work/public-domain/cc0/
 * 
 * @since 1.0
 */
function mfswp_get_modern_font_stacks() {

	return array (
		array (
			'fontFamily' => 'system-ui, sans-serif',
			'name' => 'System UI',
			'slug' => 'mfswp-system-ui'
		),
		array (
			'fontFamily' => 'Charter, "Bitstream Charter", "Sitka Text", Cambria, serif',
			'name' => 'Transitional',
			'slug' => 'mfswp-transitional'
		),
		array (
			'fontFamily' => '"Iowan Old Style", "Palatino Linotype", "URW Palladio L", P052, serif',
			'name' => 'Old Style',
			'slug' => 'mfswp-old-style'
		),
		array(
			'fontFamily' => 'Seravek, "Gill Sans Nova", Ubuntu, Calibri, "DejaVu Sans", source-sans-pro, sans-serif',
			'name' => 'Humanist',
			'slug' => 'mfswp-humanist'
		),
		array(
			'fontFamily' => 'Avenir, Montserrat, Corbel, "URW Gothic", source-sans-pro, sans-serif',
			'name' => 'Geometric Humanist',
			'slug' => 'mfswp-geometric-humanist'
		),
		array(
			'fontFamily' => 'Optima, Candara, "Noto Sans", source-sans-pro, sans-serif',
			'name' => 'Classical Humanist',
			'slug' => 'mfswp-classical-humanist'
		),
		array(
			'fontFamily' => 'Inter, Roboto, "Helvetica Neue", "Arial Nova", "Nimbus Sans", Arial, sans-serif',
			'name' => 'Neo-Grotesque',
			'slug' => 'mfswp-neo-grotesque'
		),
		array(
			'fontFamily' => '"Nimbus Mono PS", "Courier New", monospace',
			'name' => 'Monospace Slab Serif',
			'slug' => 'mfswp-monospace-slab-serif'
		),
		array(
			'fontFamily' => 'ui-monospace, "Cascadia Code", "Source Code Pro", Menlo, Consolas, "DejaVu Sans Mono", monospace',
			'name' => 'Monospace Code',
			'slug' => 'mfswp-monospace-code'
		),
		array(
			'fontFamily' => 'Bahnschrift, "DIN Alternate", "Franklin Gothic Medium", "Nimbus Sans Narrow", sans-serif-condensed, sans-serif',
			'name' => 'Industrial',
			'slug' => 'mfswp-industrial'
		),
		array(
			'fontFamily' => 'ui-rounded, "Hiragino Maru Gothic ProN", Quicksand, Comfortaa, Manjari, "Arial Rounded MT", "Arial Rounded MT Bold", Calibri, source-sans-pro, sans-serif',
			'name' => 'Rounded Sans',
			'slug' => 'mfswp-rounded-sans'
		),
		array(
			'fontFamily' => 'Rockwell, "Rockwell Nova", "Roboto Slab", "DejaVu Serif", "Sitka Small", serif',
			'name' => 'Slab Serif',
			'slug' => 'mfswp-slab-serif'
		),
		array(
			'fontFamily' => 'Superclarendon, "Bookman Old Style", "URW Bookman", "URW Bookman L", "Georgia Pro", Georgia, serif',
			'name' => 'Antique',
			'slug' => 'mfswp-antique'
		),
		array(
			'fontFamily' => 'Didot, "Bodoni MT", "Noto Serif Display", "URW Palladio L", P052, Sylfaen, serif',
			'name' => 'Didone',
			'slug' => 'mfswp-didone'
		),
		array(
			'fontFamily' => '"Segoe Print", "Bradley Hand", Chilanka, TSCu_Comic, casual, cursive',
			'name' => 'Handwritten',
			'slug' => 'mfswp-handwritten'
		)
	);
}
