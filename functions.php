/* Fixes HTML sitemap caching issues */
add_filter( 'rank_math/sitemap/enable_caching', '__return_false');

/* Fixes paginated pages canonicals */
add_filter( 'rank_math/frontend/canonical', function( $canonical ) {
	$current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  
  /* You must change the line below */
  if(false === strpos($current_url, '/slug-of-the-paginated-subdirectory/') || is_single()) return $canonical;
	$canonical = strtok($current_url, '?');
	return $canonical;
});
