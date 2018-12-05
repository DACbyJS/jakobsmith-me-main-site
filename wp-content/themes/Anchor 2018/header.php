<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

	

</head>

<body <?php body_class(); ?>>

	<header id="head">

		<div class="container">

			<div class="float-header">

				<div class="logo">

					<?php

						if ( has_custom_logo() ) :

							the_custom_logo();

						else :

							printf( '<h1><a href="%1$s">%2$s</a></h1><h2><a href="%1$s">%3$s</a></h2>', esc_url( home_url() ), get_bloginfo( 'name' ), get_bloginfo( 'description' ) );

						endif;

					?>	

				</div><!-- logo -->

				<div class="head-socials">

					<ul>

						<?php

							$socials = array('twitter','facebook','google-plus','instagram','pinterest','linkedin','vimeo','youtube', 'github', 'codepen');

							for($i=0;$i<count($socials);$i++){

								$url = '';

								$s = $socials[$i];

								$url = esc_url( anchor_setting('anchor_'.$s) );

								echo ($url != '' ? '<li><a target="_blank" href="'.$url.'"><img src="'.esc_url( get_stylesheet_directory_uri() ).'/images/'.$s.'-icon.png" alt="'.$s.'" /></a></li>':'');

							}

						?>

					</ul>

				</div><!-- head-socials -->

				<div class="head-nav">

					<?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>

				</div><!-- head-nav -->

			</div><!-- float-header -->

		</div><!-- container -->

	</header><!-- head -->