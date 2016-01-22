<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class RWMB_Button_Field extends RWMB_Field
{
	/**
	 * Get field HTML
	 *
	 * @param mixed $meta
	 * @param array $field
	 *
	 * @return string
	 */
	static function html( $meta, $field )
	{
		$attributes = call_user_func( array( RW_Meta_Box::get_class_name( $field ), 'get_attributes' ), $field, null );
		return sprintf(
			'<a href="#" %s>%s</a>',
			self::render_attributes( $attributes ),
			$field['std']
		);
	}

	/**
	 * Normalize parameters for field
	 *
	 * @param array $field
	 *
	 * @return array
	 */
	static function normalize( $field )
	{
		$field        = parent::normalize( $field );
		$field['std'] = $field['std'] ? $field['std'] : __( 'Click me', 'meta-box' );

		return $field;
	}

	/**
	 * Get the attributes for a field
	 *
	 * @param array $field
	 * @param mixed value
	 *
	 * @return array
	 */
	static function get_attributes( $field, $value = null )
	{
		$attributes = $field['attributes'];
		$attributes = wp_parse_args( $attributes, array(
			'id' => $field['id'],
		) );
		$attributes['class'] .= 'button hide-if-no-js';

		return $attributes;
	}
}
