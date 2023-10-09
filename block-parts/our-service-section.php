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
$pd_top = get_field('padding_top');
$pd_bottom = get_field('padding_bottom');

$style = array();
if(!empty($bg_color)) {
  $style[] = "background-color: {$bg_color}";
}

if(!empty($bg_image)) {
  $style[] = "background-image: url({$bg_image})";
}

if(!empty($pd_top) || $pd_top == '0') {
  $style[] = "padding-top: {$pd_top}px";
}

if(!empty($pd_bottom) || $pd_bottom == '0') {
  $style[] = "padding-bottom: {$pd_bottom}px";
}

$style_md = array();
if(!empty($pd_top) || $pd_top == '0') {
  $style_md[] = "padding-top: calc({$pd_top}px * 0.75)";
}

if(!empty($pd_bottom) || $pd_bottom == '0') {
  $style_md[] = "padding-bottom: calc({$pd_bottom}px * 0.75)";
}

$style_sm = array();
if(!empty($pd_top) || $pd_top == '0') {
  $style_sm[] = "padding-top: calc({$pd_top}px * 0.55)";
}

if(!empty($pd_bottom) || $pd_bottom == '0') {
  $style_sm[] = "padding-bottom: calc({$pd_bottom}px * 0.55)";
}

if(!empty($style)) {
  echo '<style>';
  echo '#pj-our-service--' . $block['id'] . '{' . implode(';', $style) . '}';
  if(!empty($style_md)) {
    echo '@media(max-width: 991.98px) {
            #pj-our-service--' . $block['id'] . '{' . implode(';', $style_md) . '}
          }';
  }
  if(!empty($style_sm)) {
    echo '@media(max-width: 767.98px) {
            #pj-our-service--' . $block['id'] . '{' . implode(';', $style_sm) . '}
          }';
  }
  echo '</style>';
}
?>
<section id="<?php echo 'pj-our-service--' . $block['id']; ?>" class="pj-block pj-block--section pj-our-service--section">
    <div class="pj-container">
      <div class="pj-our-service--content">
        <?php if(!empty($headline)) { ?>
          <h3 class="pj-our-service--headline">
            <?php echo $headline; ?>
          </h3>
        <?php } ?>
        <div class="pj-our-service--image-feature pj-our-service--image-feature-js <?php if(!empty($content_reverse)) echo 'pj-content-reverse'; ?>">
          <div class="pj-our-service--image-wrap">
            <?php foreach ($feature_list as $key =>$feature) { ?>
              <div class="pj-our-service--image pj-our-service--image-js" data-index="<?php echo 'pj-index-' . $key; ?>">
                <?php if(!empty($feature['image'])){ ?>
                  <img src="<?php echo $feature['image']['url'] ?>" class="pj-image" alt="<?php echo $feature['image']['title'] ?>">
                <?php } ?>
              </div>
            <?php } ?>

            <div class="pj-our-service--image pj-our-service--image-js pj-is-active" data-index="default">
              <?php if(!empty($image)){ ?>
                <img src="<?php echo $image['url'] ?>" class="pj-image" alt="<?php echo $image['title'] ?>">
              <?php } ?>
            </div>
          </div>
          <div class="pj-our-service--feature-wrap">
            <?php if(!empty($feature_list)){ ?>
              <div class="pj-our-service--featrue-list pj-accordion-list-js">
                <?php foreach ($feature_list as $key => $feature) { ?>
                  <div class="pj-our-service--featrue-item pj-accordion-item-js <?php if(!empty($feature['is_active'])) echo 'pj-is-active'; ?>">
                    <?php if(!empty($feature['title'])){ ?>
                      <h4 class="pj-featue-title pj-accordion-toggle-js" data-index="<?php echo 'pj-index-' . $key; ?>">
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
              <a class="pj-our-service--btn pj-booking--btn pj-btn" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>">
                <?php echo $cta_button['title']; ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
</section>
