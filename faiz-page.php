<?php
get_header();
/*
* Template Name: Query Page 
*
*/
if ( is_user_logged_in() ) {
	echo 'Welcome, registered user!';
}else {
	echo 'Welcome, visitor!';
}
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 5,
);

$query = new WP_Query($args);
if($query->have_posts()){
	echo '<ul>';
	while($query->have_posts()){
		$query->the_post();
		?>
		<li><a href="<?php echo the_permalink(); ?>"> <?php echo the_title();?> </a>

<?php
	}
	wp_reset_postdata();
	echo '</ul>';
} else {
	echo "sorry no post found";
}
get_footer();
