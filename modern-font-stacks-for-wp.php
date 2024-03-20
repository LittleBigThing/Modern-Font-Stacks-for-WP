<?php
/**
 * Plugin Name: Modern Font Stacks for WP
 * Plugin URI: https://csaba.blog/modern-font-stacks-for-wordpress
 * Description: This lightweight plugin integrates the Modern Font Stacks project into WordPress (block) themes. These are system font stacks organized by typeface classification for every modern OS. The fastest fonts available. No downloading, no layout shifts, no flashes — just instant renders.
 * Requires at least: 6.5
 * Requires PHP: 7.0
 * Version: 2.0
 * Author: LittleBigThings
 * Author URI: https://littlebigthings.be
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: modern-font-stacks-for-wp
 */

namespace ModernFontStacksforWP;

class FontCollection {

	/**
	 * Generate the stacks based on Modern Font Stacks from https://modernfontstacks.com or https://github.com/system-fonts/modern-font-stacks.
	 *
	 * @license CC0 1.0 Universal https://creativecommons.org/share-your-work/public-domain/cc0/
	 *
	 * @access public
	 * @since 2.0
	 */
	public $stacks = [
		array(
			'font_family_settings' => (
				array (
					'fontFamily' => 'Charter, "Bitstream Charter", "Sitka Text", Cambria, serif',
					'name' => 'Transitional',
					'slug' => 'mfswp-transitional'
				)
			),
			'categories' => [ 'serif' ]
		),
		array(
			'font_family_settings' => (
				array (
					'fontFamily' => '"Iowan Old Style", "Palatino Linotype", "URW Palladio L", P052, serif',
					'name' => 'Old Style',
					'slug' => 'mfswp-old-style'
				)
			),
			'categories' => [ 'serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Seravek, "Gill Sans Nova", Ubuntu, Calibri, "DejaVu Sans", source-sans-pro, sans-serif',
					'name' => 'Humanist',
					'slug' => 'mfswp-humanist'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Avenir, Montserrat, Corbel, "URW Gothic", source-sans-pro, sans-serif',
					'name' => 'Geometric Humanist',
					'slug' => 'mfswp-geometric-humanist'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Optima, Candara, "Noto Sans", source-sans-pro, sans-serif',
					'name' => 'Classical Humanist',
					'slug' => 'mfswp-classical-humanist'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Inter, Roboto, "Helvetica Neue", "Arial Nova", "Nimbus Sans", Arial, sans-serif',
					'name' => 'Neo-Grotesque',
					'slug' => 'mfswp-neo-grotesque'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => '"Nimbus Mono PS", "Courier New", monospace',
					'name' => 'Monospace Slab Serif',
					'slug' => 'mfswp-monospace-slab-serif'
				)
			),
			'categories' => [ 'monospace', 'slab-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'ui-monospace, "Cascadia Code", "Source Code Pro", Menlo, Consolas, "DejaVu Sans Mono", monospace',
					'name' => 'Monospace Code',
					'slug' => 'mfswp-monospace-code'
				)
			),
			'categories' => [ 'monospace' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Bahnschrift, "DIN Alternate", "Franklin Gothic Medium", "Nimbus Sans Narrow", sans-serif-condensed, sans-serif',
					'name' => 'Industrial',
					'slug' => 'mfswp-industrial'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'ui-rounded, "Hiragino Maru Gothic ProN", Quicksand, Comfortaa, Manjari, "Arial Rounded MT", "Arial Rounded MT Bold", Calibri, source-sans-pro, sans-serif',
					'name' => 'Rounded Sans',
					'slug' => 'mfswp-rounded-sans'
				)
			),
			'categories' => [ 'sans-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Rockwell, "Rockwell Nova", "Roboto Slab", "DejaVu Serif", "Sitka Small", serif',
					'name' => 'Slab Serif',
					'slug' => 'mfswp-slab-serif'
				)
			),
			'categories' => [ 'slab-serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Superclarendon, "Bookman Old Style", "URW Bookman", "URW Bookman L", "Georgia Pro", Georgia, serif',
					'name' => 'Antique',
					'slug' => 'mfswp-antique'
				)
			),
			'categories' => [ 'serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => 'Didot, "Bodoni MT", "Noto Serif Display", "URW Palladio L", P052, Sylfaen, serif',
					'name' => 'Didone',
					'slug' => 'mfswp-didone'
				)
			),
			'categories' => [ 'serif' ]
		),
		array(
			'font_family_settings' => (
				array(
					'fontFamily' => '"Segoe Print", "Bradley Hand", Chilanka, TSCu_Comic, casual, cursive',
					'name' => 'Handwritten',
					'slug' => 'mfswp-handwritten'
				)
			),
			'categories' => [ 'cursive' ]
		)
	];

	/**
	 * Initiate the class by adding the font collection to the library.
	 *
	 * @access public
	 * @since 2.0
	 */
	public function __construct() {

		wp_register_font_collection( 'modern-font-stacks', $this->config() );
	}

	/**
	 * Set up the font categories.
	 *
	 * @access public
	 * @since 2.0
	 */
	public function categories() {
		
		return [
			array(
				'name' => _x( 'Serif', 'Font category name', 'modern-font-stacks-for-wp' ),
				'slug' => 'serif',
			),
			array(
				'name' => _x( 'Sans Serif', 'Font category name', 'modern-font-stacks-for-wp' ),
				'slug' => 'sans-serif',
			),
			array(
				'name' => _x( 'Slab Serif', 'Font category name', 'modern-font-stacks-for-wp' ),
				'slug' => 'slab-serif',
			),
			array(
				'name' => _x( 'Monospace', 'Font category name', 'modern-font-stacks-for-wp' ),
				'slug' => 'monospace',
			),
			array(
				'name' => _x( 'Handwriting', 'Font category name', 'modern-font-stacks-for-wp' ),
				'slug' => 'cursive',
			)
		];
	}

	public function config() {

		return array (
			'name'          => _x( 'Modern Stacks', 'Font collection name', 'modern-font-stacks-for-wp' ),
			'description'   => _x( 'These system font stacks are organized by typeface classification for every modern OS. The fastest fonts available. No downloading, no layout shifts, no flashes — just instant renders.', 'Font collection description', 'modern-font-stacks-for-wp' ),
			'font_families' => $this->stacks,
			'categories'    => $this->categories(),
		);
	}
}

new \ModernFontStacksforWP\FontCollection();
