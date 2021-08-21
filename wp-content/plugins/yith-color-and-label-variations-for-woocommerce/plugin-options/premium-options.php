<?php
/**
 * Premium tab
 *
 * @author  YITH
 * @package YITH WooCommerce Color and Label Variations
 * @version 1.0.0
 */

defined( 'YITH_WCCL' ) || exit; // Exit if accessed directly.

return apply_filters(
	'ywcl_premium_settings',
	array(
		'premium' => array(
			'premium_tab' => array(
				'type'         => 'custom_tab',
				'action'       => 'ywcl_premium_tab',
				'hide_sidebar' => true,
			),
		),
	)
);
