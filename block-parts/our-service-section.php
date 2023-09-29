<?php
/**
 * Block Name: our-service Section
**/

$headline = get_field('headline');
$image = get_field('image');
$feature_list = get_field('feature_list');
$cta_button = get_field('cta_button');

$content_reverse = get_field('content_reverse');
$bg_color = get_field('background_color');
$bg_image = get_field('background_image');

$style = array();
if(!empty($bg_color)) {
  $style[] = "background-color: {$bg_color}";
}

if(!empty($bg_image)) {
  $style[] = "background-image: url({$bg_image})";
}

if(!empty($style)) {
  echo '<style>#pj-our-service--' . $block['id'] . '{' . implode(';', $style) . '}</style>';
}
?>
<section id="<?php echo 'pj-our-service--' . $block['id']; ?>" class="pj-block pj-our-service--section">
    <div class="pj-container">
      <div class="pj-our-service--content">
        <?php if(!empty($headline)) { ?>
          <h3 class="pj-our-service--headline">
            <?php echo $headline; ?>
          </h3>
        <?php } ?>
        <div class="pj-our-service--image-feature <?php if(!empty($content_reverse)) echo 'pj-content-reverse'; ?>">
          <div class="pj-our-service--image-wrap">
            <?php if(!empty($image)){ ?>
              <div class="pj-our-service--image">
                <img src="<?php echo $image['url'] ?>" class="pj-image" alt="<?php echo $image['title'] ?>">
              </div>
            <?php } ?>
          </div>
          <div class="pj-our-service--feature-wrap">
            <?php if(!empty($feature_list)){ ?>
              <div class="pj-our-service--featrue-list pj-accordion-list-js">
                <?php foreach ($feature_list as $feature) { ?>
                  <div class="pj-our-service--featrue-item pj-accordion-item-js <?php if(!empty($feature['is_active'])) echo 'pj-is-active'; ?>">
                    <?php if(!empty($feature['title'])){ ?>
                      <h4 class="pj-featue-title pj-accordion-toggle-js">
                        <?php echo $feature['title']; ?>
                      </h4>
                    <?php } ?>
                    <?php if(!empty($feature['desc'])){ ?>
                      <div class="pj-featue-desc pj-accordion-panel-js">
                        <?php echo $feature['desc']; ?>
                      </div>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>

            <?php if(!empty($cta_button) && !empty($cta_button['title'])) { ?>
              <a class="pj-our-service--btn pj-btn" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>">
                <?php echo $cta_button['title']; ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
</section>
