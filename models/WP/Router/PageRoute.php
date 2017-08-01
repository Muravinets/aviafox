<?php

/**
 * Class PageRoute
 *
 * Extends WP_Router routing
 */
class PageRoute
{
	public static function init()
	{
		add_action('wp_router_generate_routes', array(get_class(), 'generate_routes'), 10, 1);
	}

	public static function generate_routes( WP_Router $router )
	{
		$router->add_route('wp-router-pageroute', array(
			'path' => '^route/(.*?)/(.*?)$',
			'query_vars' => array(
				'route_departure_name' => 1,
				'route_destination_name' => 2,
			),
			'page_callback' => array(get_class(), 'page_callback'),
			'page_arguments' => array('sample_argument'),
			'access_callback' => TRUE,
			'title' => 'WP Router Sample Page',
			'template' => [
				Z_THEME_PATH . '/page-route.php'
			]
		));
	}

	public static function page_callback( $argument )
	{
		$post = get_page_by_path('route-page');
		echo $post->post_content;
	}

}