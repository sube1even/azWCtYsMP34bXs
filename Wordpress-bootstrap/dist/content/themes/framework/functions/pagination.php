<?php
/**
 *
 */

function framework_pagination()
{
	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 )
		return;

	$current_page = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $current_page >= 1 )
		$links[] = $current_page;

	/**	Add the pages around the current page to the array */
	if ( $current_page >= 3 )
	{
		$links[] = $current_page - 1;
		$links[] = $current_page - 2;
	}

	if ( ( $current_page + 2 ) <= $max )
	{
		$links[] = $current_page + 2;
		$links[] = $current_page + 1;
	}

	echo '<div class="pagination"><ul>' . "\n";


	/**	Previous Post Link */
	if ( get_previous_posts_link() )
	{
		echo '<li class="first"><a href="'. get_pagenum_link( 1 ) . '"></a></li>';
		echo '<li class="prev"><a href="'. get_pagenum_link( $current_page - 1 ) . '"></a></li>';
	}
	else
	{
		echo '<li class="first"><span></span></li><li class="prev"><span></span></li>';
	}

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) )
	{
		$class = 1 == $current_page ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><span>…</span></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link )
	{
		$class = $current_page == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) )
	{
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span>…</span></li>' . "\n";

		$class = $current_page == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
	{
		echo '<li class="next"><a href="'. get_pagenum_link( $current_page + 1 ) . '"></a></li>';
		echo '<li class="last"><a href="'. get_pagenum_link( $max ) . '"></a></li>';
	}
	else
	{
		echo '<li class="next"><span></span></li><li class="last"><span></span></li>';
	}

	echo '</ul></div>' . "\n";

}

