<?php
/**
 * Site Header.
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="pj_page" class="pj-site">
	<?php
		$site_name = get_bloginfo( 'name' );
		$site_desc = get_bloginfo( 'description', 'display' );
		$site_logo = get_field('site_logo', 'options');
		$site_logo_sticky = get_field('site_logo_sticky', 'options');
		$site_book_appointment = get_field('site_book_appointment', 'options');
	?>
	<header id="pj-site-header" class="pj-site-header pj-site-header--sticky">
		<div class="pj-container">
			<div class="pj-main-header">
				<div class="pj-site-logo">
					<?php if(!empty($site_logo)) { ?>
						<a href="/" class="pj-site-logo-link" rel="home">
              <img src="<?php echo $site_logo['url'] ?>" class="pj-site-logo-image" alt="Chemist Greenhouse C">
							<?php if(!empty($site_logo_sticky)){ ?>
								<img src="<?php echo $site_logo_sticky['url'] ?>" class="pj-site-logo-image pj-site-logo-image--sticky" alt="Chemist Greenhouse C">
							<?php } ?>
            </a>
					<?php } else { ?>
						<?php if($site_name) { ?>
						<h1 class="pj-site-title">
							<?php echo $site_name; ?>
						</h1>
						<?php } ?>

						<?php if ($site_desc && true === get_theme_mod('display_title_and_tagline', true)) { ?>
							<div class="site-desc">
								<?php echo $site_desc; ?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="pj-primary-menu">
					<?php
						if(has_nav_menu('primary')) {
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu_class'      => 'pj-menu-wrapper',
									'container_class' => 'pj-primary-menu-container',
									'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
									'fallback_cb'     => false,
								)
							);
						}
					?>

					<?php if(!empty($site_book_appointment)  && !empty($site_book_appointment['title'])){ ?>
						<div class="pj-extra-buttons">
							<a class="pj-booking--btn pj-btn pj-btn--yellow" href="<?php echo $site_book_appointment['url']; ?>" target="<?php echo $site_book_appointment['target']; ?>">
								<?php echo $site_book_appointment['title']; ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
  </header>

	<div id="pj_content" class="pj-site-content">
		<div id="pj_primary" class="pj-content-area">
			<main id="pj_main" class="pj-site-main">
