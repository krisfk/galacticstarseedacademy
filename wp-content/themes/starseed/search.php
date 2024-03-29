<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>


<?php
if( !pms_is_member_of_plan( array( 178 ) ) ) 
{
    wp_redirect(get_site_url().'/ascension-mechanics-library-introduction');
    exit;
}
?>


<img class="star0 fadein-ele" style=" width: 500px !important;position: absolute;top: 82px;left: -444px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star0.png" alt="">

<img class="star2 fadein-ele" style="  width: 320px !important;position: absolute;top: -2px;left: 540px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star2.png" alt="">

<img class="star3 fadein-ele " style=" width: 300px !important;position: absolute;top: 120px;right: -163px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star3.png" alt="">

<img class="star4 fadein-ele" style="width: 170px !important;position: absolute;bottom: 51px;left: 600px;"
    src="<?php echo get_template_directory_uri();?>/assets/images/star4.png" alt="">


<div class="inner-container  mt-5 text-center">
    <div class="row align-items-center justify-content-center gx-5">

        <div class="col-lg-6 col-md-12 col-sm-12 col-12  txt-top  ">
            <h1>
                <?php echo 	'<span class="page-description search-term">搜尋 "' . esc_html( get_search_query() ) . '"</span>'
?>
            </h1>
        </div>
    </div>
</div>

<?php

if ( have_posts() ) {
	?>


<div class="search-result-count default-max-width text-center">
    <?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'找到 %d 篇內容。',
					'找到 %d 篇內容。',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
</div><!-- .search-result-count -->
<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post();
		?>
<div class="position-relative">
    <?php

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
		?>

    <img class="star7 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(30,100); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;right: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">
    <img class="star8 fadein-ele animate__animated animate__fadeIn delay-2"
        style="position: absolute;top: <?php echo rand(200,400); ?>px;width: <?php echo rand(150,200); ?>px !important;opacity: 0;left: <?php echo rand(-200,-100); ?>px"
        src="http://64.227.13.14/starseed/wp-content/themes/starseed/assets/images/star<?php echo rand(0,10); ?>.png"
        alt="">
    <?php
	} // End the loop.

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();
	?>

</div>
<?php

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();