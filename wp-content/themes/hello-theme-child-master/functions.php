<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );


/*  CSS
 * Enqueue styles
 */
if ( ! function_exists( 'matrixhive_load_styles' ) ) {
	function matrixhive_load_styles() {
		
		wp_enqueue_style( 'slick_css', get_stylesheet_directory_uri() .'/assets/css/slick.css', false, null );
	}
}
add_action( 'wp_enqueue_scripts', 'matrixhive_load_styles' );


/* JS  (function.php)
 * Enqueue script
 */
if ( ! function_exists( 'matrixhive_load_scripts' ) ) {
	function matrixhive_load_scripts() {
		
		wp_enqueue_script( 'slick_js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'function-js', get_stylesheet_directory_uri() . '/assets/js/function.js',  array( 'jquery' ), rand(), true );
	}
}
add_action( 'wp_enqueue_scripts', 'matrixhive_load_scripts' ,1000);

/* Home Page Hero Slider */
function hero_slider(){
	global $post;
	$post_id = $post->ID;
	ob_start();

	$query = new WP_Query(
		array(
			'post_type' => 'hero-slider',
			'post_status' => 'publish',
			'order' => 'ASC'
		)
	);

	if( $query->have_posts() ):
	?>
	<div class="hero-slider">
		<?php 
			while( $query->have_posts()):
				$query->the_post();
				$post_id = $post->ID;
				$img = get_the_post_thumbnail_url($post_id);
				$heading = get_field('heading', $post_id);
				$sub_heading = get_field('sub_title', $post_id);
				$desc = get_field('description', $post_id);
				$overlay = get_field('overlay', $post_id);
		?>
		<div class="slider-item" style="background: url('<?php echo $img; ?>') no-repeat;">
			<div class="overlay" style="background: <?php if( !empty($overlay) ){ echo $overlay; }else{ echo '#0000004d'; } ?>">
				<div class="slide">
					<h2><?php echo $heading; ?></h2>
					<h3><?php echo $sub_heading; ?></h3>
					<p><?php echo $desc; ?></p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php
			wp_reset_postdata();
	endif;
	return ob_get_clean();
}
add_shortcode( 'hero_slider', 'hero_slider' );

/* Our Services Slider */
function home_our_service_slider(){
	global $post;
	$post_id = $post->ID;
	ob_start();

	$query = new WP_Query(
		array(
			'post_type' => 'service',
			'post_status' => 'publish',
			'order' => 'ASC'
		)
	);
	
	if( $query->have_posts() ):
	?>
	<div class="service-list">
		<?php 
			while( $query->have_posts() ):
				$query->the_post();
				$img = get_field('select_icon');
				$excerpt = get_the_excerpt();
                $desc = substr($excerpt, 0, 100);
				$link = get_the_permalink();
		?>
		<div class="service-item">
			<div class="service-box">
				<div class="service-img">
					<img src="<?php echo $img; ?>" alt="Service Icon">
					<h4><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
				</div>

				<div class="service-desc">
					<div class="service-content">
						<p><?php echo $desc; ?></p>
					</div>

					<div class="service-btn">
						<a href="<?php echo $link; ?>">Read More <i class="fas fa-chevron-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<?php 
			endwhile;
		?>
	</div>
	<?php
		wp_reset_postdata();
	endif;
	return ob_get_clean();
}
add_shortcode( 'home_our_service_slider', 'home_our_service_slider' );

/* Client Review Slider */
function client_review(){
	global $post;
	$post_id = $post->ID;
	ob_start();

	$query = new WP_Query(
		array(
			'post_type' => 'client-review',
			'post_status' => 'publish',
			'order' => 'DESC',
			'posts_per_page' => 5
		)
	);

	if( $query->have_posts() ):
	?>
	<div class="client-review-list">
		<?php
			while( $query->have_posts() ):
				$query->the_post();
				$sub_heading = get_field('sub_heading');
		?>
		<div class="review-item">
			<div class="review-box">
				<div class="review-content">
					<?php the_content(); ?>
				</div>

				<div class="client-detail">
					<div class="client-name">
						<h2><?php the_title(); ?></h2>
						<h3><?php echo $sub_heading; ?></h3>
					</div>

					<div class="client-rating">
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li class="rate">5.0</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php	
		wp_reset_postdata();
	endif;
	return ob_get_clean();
}
add_shortcode( 'client_review', 'client_review' );