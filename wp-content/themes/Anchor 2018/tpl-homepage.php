<?php

/*

Template Name: Homepage

*/

get_header();

$slider = array(

				'post_type' => 'post',

				'category_name' => 'slide',

				'posts_per_page' => -1,

				'ignore_sticky_posts' => true

			);

$the_query = new WP_Query( $slider );

	 if ( $the_query->have_posts() ) :

?>

<div class="slider-container">

<div class="slider-control left inactive"></div>
<div class="slider-control right"></div>
<ul class="slider-pagi"></ul>

<div class="slider">
	<?php $slide_num = 0; ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post();

	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
	
	<div class="slide slide-<?php echo $slide_num; ?> active">
		<div style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>); " class="slide__bg"></div>
		<div class="slide__content">
			<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
				<path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
			</svg>
			<div class="slide__text">
				<h2 class="slide__text-heading"><?php the_title();?></h2>
				<p class="slide__text-desc"><?php echo get_the_excerpt();?></p>
				<a href="<?php the_permalink(); ?>" class="slide__text-link">Project link</a>
			</div>
		</div>
	</div>

	<?php $slide_num++; ?>
	<?php endwhile; wp_reset_postdata(); ?>

</div>

</div>

<?php endif; ?>

<div class="feature-text-area">

	<div class="container">

		<h3><?php echo (anchor_setting('anchor_hometext') !='' ? sanitize_text_field( anchor_setting('anchor_hometext') ) : ''); ?></h3>

	</div><!-- container -->

</div><!-- feature-text-area -->

<?php the_content(); ?>

<?php

	$port_args = array(

			'post_type' => 'post',

			'posts_per_page' => 6,

			'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),

			'ignore_sticky_posts' => true,

			'category_name' => 'featured',

			);

	$port_query = new WP_Query( $port_args );

	if ( $port_query->have_posts() ) :

		?>

<div class="home-portfolio">

	<div class="container">

	<?php while ( $port_query->have_posts() ) : $port_query->the_post(); ?>

		<div class="portfolio-box">

			<div class="port-image">

				<?php

					if ( 'video' == get_post_format( get_the_ID() ) ) :



	 					echo anchor_get_video( get_the_ID() );



	 				else :

		 					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(600,600) ); 

							echo '<a href="'.esc_url( get_permalink() ).'" style="background-image: url('. esc_url( $thumbnail[0] ).')"></a>';

					

					endif;

				?>

			</div>

			<div class="port-body">

				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<div class="port-cats"> <?php the_category(', '); ?></div>

			</div>

		</div>

	<?php endwhile; wp_reset_postdata(); ?>

		<div class="clear"></div>

	</div><!-- container -->

</div><!-- home-portfolio -->

<?php

	endif;

?>

<?php

	$blog_args = array(

				'post_type' => 'post',

				'posts_per_page' => 3,

				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),

				'category_name' => 'blog'

				);

	$blog = new WP_Query( $blog_args );

	if ( $blog->have_posts() ) :

?>

 <div class="blog">

	<div class="container">

		<div class="blog-posts">

			<?php

				while ( $blog->have_posts() ) : $blog->the_post();

				?>

					<div class="blog-post-box <?php echo (is_sticky() ? 'sticky-post': ''); ?>">

						<div class="blog-post-feature">

						<?php

							if ( 'video' == get_post_format( get_the_ID() ) ) :



			 					echo anchor_get_video( get_the_ID() );



			 				else :

					 			

					 			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(600,600) ); 

								echo '<div class="blog-post-image">

										<a href="'.esc_url(get_permalink()).'" style="background-image: url('.esc_url($thumbnail[0]).')"></a>

									</div>';

							endif;

						?>

						</div>

						<div class="blog-post-info">

							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<div class="blog-post-meta"> <?php the_time(get_option('date_format') ); ?> | <a href="<?php comments_link(); ?>"><?php  comments_number( __('0 Comments','anchor'), __(' 1 Comment','anchor'), '% '.__('Comments','anchor') ); ?></a></div>

							<div class="blog-post-excerpt">

								<p><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ) ?></p>

							</div>

						</div>

					</div>

				<?php

					endwhile; wp_reset_postdata();

				?>

		</div><!-- blog-posts -->

	</div><!-- container -->

</div><!-- blog -->

<?php endif; ?>

<?php

get_footer();

?>