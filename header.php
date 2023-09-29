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

					<div class="pj-menu-mb-toggle pj-menu-mb-toggle--close">
						<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" class="icon icon-close" fill="none" viewBox="0 0 18 17">
							<path d="M.865 15.978a.5.5 0 00.707.707l7.433-7.431 7.579 7.282a.501.501 0 00.846-.37.5.5 0 00-.153-.351L9.712 8.546l7.417-7.416a.5.5 0 10-.707-.708L8.991 7.853 1.413.573a.5.5 0 10-.693.72l7.563 7.268-7.418 7.417z" fill="currentColor">
						</path></svg>
					</div>
				</div>
				<div class="pj-menu-mb-toggle pj-menu-mb-toggle--open">
					<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" class="icon icon-hamburger" fill="none" viewBox="0 0 18 16">
						<path d="M1 .5a.5.5 0 100 1h15.71a.5.5 0 000-1H1zM.5 8a.5.5 0 01.5-.5h15.71a.5.5 0 010 1H1A.5.5 0 01.5 8zm0 7a.5.5 0 01.5-.5h15.71a.5.5 0 010 1H1a.5.5 0 01-.5-.5z" fill="currentColor">
					</path></svg>
				</div>
			</div>
		</div>
  </header>

	<div id="pj_content" class="pj-site-content">
		<div id="pj_primary" class="pj-content-area">
			<main id="pj_main" class="pj-site-main">
