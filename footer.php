<?php
/**
 * Site Footer
 *
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php
		$site_logo = get_field('site_logo', 'options');
	?>

	<footer id="pj_site_footer" class="pj-site-footer">
		<div class="pj-container">
			<div class="pj-main-footer">
				<div class="pj-footer-block pj-footer-block--logo">
					<?php if(!empty($site_logo)) { ?>
						<a href="/" class="pj-site-logo-link" rel="home">
              <img src="<?php echo $site_logo['url'] ?>" class="pj-site-logo-image" alt="Chemist Greenhouse C">
            </a>
					<?php } ?>
				</div>

				<div class="pj-footer-block pj-footer-block--links">
					<h3 class="pj-footer-block--headline">Quick links</h3>
					<div class="pj-footer-block--content">
						<?php
							if(has_nav_menu('footer')) {
								wp_nav_menu(
									array(
										'theme_location'  => 'footer',
										'menu_class'      => 'pj-menu-wrapper',
										'container_class' => 'pj-footer-menu-container',
										'items_wrap'      => '<ul id="footer-menu-list" class="%2$s">%3$s</ul>',
										'fallback_cb'     => false,
									)
								);
							}

							if(has_nav_menu('privacy')) {
								wp_nav_menu(
									array(
										'theme_location'  => 'privacy',
										'menu_class'      => 'pj-menu-wrapper',
										'container_class' => 'pj-privacy-menu-container',
										'items_wrap'      => '<ul id="privacy-menu-list" class="%2$s">%3$s</ul>',
										'fallback_cb'     => false,
									)
								);
							}
						?>
					</div>
				</div>

				<div class="pj-footer-block pj-footer-block--subscribe">
					<h3 class="pj-footer-block--headline">Subscribe to hear more</h3>
					<div class="pj-footer-block--content">
						<?php
							echo do_shortcode('[newsletter_form button_label="Submit"]
																	[newsletter_field name="email" label="Your best email" placeholder="Email address"]
																[/newsletter_form]');
						?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
