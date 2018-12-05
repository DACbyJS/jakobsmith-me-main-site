<?php

get_header();

?>

<div class="content">

	<div class="container">

		<div class="post_content">

			<?php if(have_posts()): the_post(); ?>

			<article class="post_box" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				I am here.

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

			</article>

			<div class="clear"></div>

			<?php endif;?>

		</div>

		<div class="clear"></div>

	</div>

	</div>

	<?php

get_footer();

?>