		<footer id="foot">
			<div class="main-foot">
				<div class="container">
					<div class="foot-col">
						<?php dynamic_sidebar('footer-1'); ?>
					</div>
					<div class="foot-col">
						<?php dynamic_sidebar('footer-2'); ?>
					</div>
					<div class="foot-col">
						<?php dynamic_sidebar('footer-3'); ?>
					</div>
					<div class="foot-col">
						<?php dynamic_sidebar('footer-4'); ?>
					</div>
				</div>
			</div>
			<div class="bottom-foot">
				<div class="container">
					<p class="credits"><?php echo ( anchor_setting('anchor_copyright') !='' ? sanitize_text_field( anchor_setting('anchor_copyright') ) : anchor_footer_copyright() ); ?></p>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>