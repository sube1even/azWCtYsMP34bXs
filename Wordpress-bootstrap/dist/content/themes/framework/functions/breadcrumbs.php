<?php

$breadcrumb_args = array(
	'show_current_item' => true,
	'separator' => ''
);


/**
 * Breadcrumb
 */
class Breadcrumbs
{

	/**
	 * @var array
	 */
	private $crumbs = array();


	/**
	 * @var array
	 */
	public $default_args = array(
		'show_current_item' => false,
		'separator' => ''
	);


	/**
	 * @var
	 */
	public $args = array();


	/**
	 *
	 */
	public function __construct()
	{
		global $post;

		$this->init_args();

		// Don't display on homepage
		if ( is_front_page() ) return;

		$this->add_crumb( 'Home', home_url() );

		// Blog page
		if ( is_home() || is_singular( 'post' )  )
		{
			$this->add_crumb( 'Blog', get_permalink( get_option('page_for_posts' ) ) );
		}

		if ( is_archive() )
		{
			$this->add_post_type_crumb();
		}

		if ( is_category() )
		{
			$category = current( get_the_category() );
			$this->add_crumb( $category->name, get_category_link( $category ) );
		}
		elseif ( is_single() )
		{
			$this->add_post_type_crumb();
			$this->add_current_crumb();
		}
		elseif ( is_page() )
		{
			if ( $post->post_parent )
			{
				$ancestors = get_post_ancestors( $post->ID );
				$ancestors = array_reverse($ancestors);

				foreach ( $ancestors as $ancestor )
				{
					$this->add_crumb( get_the_title( $ancestor ), get_permalink( $ancestor ) );
				}
			}

			$this->add_current_crumb();

		}
		elseif ( is_tag() )
		{
			//single_tag_title();
		}
		elseif ( is_tax() )
		{
			$this->add_crumb( framework_get_queried_object_title() );
		}
		elseif ( is_day() )
		{
			//echo "<li>Archive for "; the_time('F jS, Y'); echo'</li>';
		}
		elseif ( is_month() )
		{
			$this->add_crumb( get_the_time('Y'), get_year_link( get_the_time('Y') ) );
			$this->add_crumb( get_the_time('F') );
		}
		elseif ( is_year() )
		{
			$this->add_crumb( get_the_time('Y') );
		}
		elseif ( is_author() )
		{
			$this->add_crumb( get_the_author(), false );
		}
		elseif ( isset($_GET['paged'] ) && ! empty( $_GET['paged'] ) )
		{
			//echo "<li>Blog Archives"; echo'</li>';
		}
		elseif ( is_search() )
		{
			//echo "<li>Search Results"; echo'</li>';
		}
	}


	/**
	 * @param $name
	 * @param bool $link
	 */
	function add_crumb( $name, $link = false )
	{
		$this->crumbs[] = array(
			'name' => $name,
			'link' => $link,
		);
	}


	/**
	 *
	 */
	public function add_post_type_crumb()
	{
		$post_type = get_query_var( 'post_type' );
		if ( is_array( $post_type ) )
			$post_type = reset( $post_type );

		$post_type_obj = get_post_type_object( $post_type );

		if ( $post_type_obj )
			$this->add_crumb( $post_type_obj->labels->name, trailingslashit(home_url()) . $post_type_obj->has_archive );
	}


	/**
	 *
	 */
	public function add_current_crumb()
	{
		$this->add_crumb( get_the_title(), get_permalink() );
	}


	/**
	 * @return array
	 */
	public function get_crumbs()
	{
		return $this->crumbs;
	}


	/**
	 * @return int
	 */
	public function get_crumbs_count()
	{
		return count( $this->crumbs );
	}


	/**
	 *
	 */
	private function init_args()
	{
		global $breadcrumb_args;
		$this->args = array_merge( $this->default_args, $breadcrumb_args );
	}


	/**
	 * @param $name
	 * @param $link
	 */
	public function append_crumb_before_current( $name, $link )
	{
		$last = end( $this->crumbs );
		array_pop( $this->crumbs );

		$this->crumbs[] = array(
			'name' => $name,
			'link' => $link
		);

		$this->crumbs[] = $last;
	}


	/**
	 *
	 */
	public function render()
	{

		$crumbs = $this->get_crumbs();

		echo '<ul class="breadcrumbs">';

		$i = 1;
		foreach ( $crumbs as $crumb )
		{
			// Last crumb
			if ( $this->get_crumbs_count() == $i )
			{
				if ( $this->args['show_current_item'] )
					echo '<li>' . $crumb[ 'name' ] . '</li>';
			}
			else
			{
				echo '<li><a href="' . $crumb[ 'link' ] . '">'
					. $crumb[ 'name' ]
					. '</a></li>';

				if ( $this->args['separator'] )
					echo $this->args['separator'];
			}

			$i++;
		}

		echo '</ul>';
	}




}


/**
 *
 */
function framework_breadcrumb()
{
	$breadcrumb = new Breadcrumbs();
	$breadcrumb->render();
}
