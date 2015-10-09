<?php

/**
 * Class Permalink
 */
class Permalink
{
	static function events()
	{
		return home_url() . '/events/';
	}

	static function daily_events()
	{
		return home_url() . '/events/daily/';
	}

	static function sponsors()
	{
		return get_permalink( 49 );
	}

	static function travel_packages()
	{
		return home_url() . '/travel-packages/';
	}

	static function blog()
	{
		return get_permalink( get_option('page_for_posts' ) );
	}

}


