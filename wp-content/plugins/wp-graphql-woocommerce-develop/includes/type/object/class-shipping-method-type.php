<?php
/**
 * WPObject Type - Shipping_Method_Type
 *
 * Registers ShippingMethod WPObject type and queries
 *
 * @package WPGraphQL\WooCommerce\Type\WPObject
 * @since   0.0.2
 */

namespace WPGraphQL\WooCommerce\Type\WPObject;

use GraphQL\Error\UserError;
use GraphQLRelay\Relay;
use WPGraphQL\WooCommerce\Data\Factory;

/**
 * Class Shipping_Method_Type
 */
class Shipping_Method_Type {

	/**
	 * Registers shipping method type
	 */
	public static function register() {
		register_graphql_object_type(
			'ShippingMethod',
			array(
				'description' => __( 'A shipping method object', 'wp-graphql-woocommerce' ),
				'interfaces'  => array( 'Node' ),
				'fields'      => array(
					'id'          => array(
						'type'        => array( 'non_null' => 'ID' ),
						'description' => __( 'The globally unique identifier for the tax rate.', 'wp-graphql-woocommerce' ),
					),
					'databaseId'  => array(
						'type'        => array( 'non_null' => 'ID' ),
						'description' => __( 'The ID of the shipping method in the database', 'wp-graphql-woocommerce' ),
					),
					'title'       => array(
						'type'        => 'String',
						'description' => __( 'Shipping method title.', 'wp-graphql-woocommerce' ),
					),
					'description' => array(
						'type'        => 'String',
						'description' => __( 'Shipping method description.', 'wp-graphql-woocommerce' ),
					),
				),
			)
		);
	}
}