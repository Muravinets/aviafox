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
		add_action('pre_get_posts', [get_class(), 'edit_query'], 99, 1);

		add_action('wp_router_generate_routes', [get_class(), 'generate_routes'], 10, 1);
	}

	public static function edit_query(WP_Query $query)
	{
		if (
			isset($query->query_vars[WP_Router_Page::QUERY_VAR])
			&&
			'wp-router-pageroute' === $query->query_vars[WP_Router_Page::QUERY_VAR]
		) {
			$query->query_vars['p'] = 76;
			$query->query_vars['post_type'] = 'page';
		}
	}

	public static function generate_routes( WP_Router $router )
	{
		$router->add_route('wp-router-pageroute', array(
			'path' => '^routes/(.*?)/(.*?)$',
			'query_vars' => array(
				'route_departure_name' => 1,
				'route_destination_name' => 2,
			),
			'page_callback' => [get_class(), 'page_callback'],
			'page_arguments' => ['sample_argument'],
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