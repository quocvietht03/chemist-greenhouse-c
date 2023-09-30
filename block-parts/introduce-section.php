<?php
/**
 * Block Name: Introduce Section
**/

$headline = get_field('headline');
$description = get_field('description');
$feature_list = get_field('feature_list');
$cta_button = get_field('cta_button');

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
  echo '#pj-introduce--' . $block['id'] . '{' . implode(';', $style) . '}';
  if(!empty($style_md)) {
    echo '@media(max-width: 991.98px) {
            #pj-introduce--' . $block['id'] . '{' . implode(';', $style_md) . '}
          }';
  }
  if(!empty($style_sm)) {
    echo '@media(max-width: 767.98px) {
            #pj-introduce--' . $block['id'] . '{' . implode(';', $style_sm) . '}
          }';
  }
  echo '</style>';
}
?>
<section id="<?php echo 'pj-introduce--' . $block['id']; ?>" class="pj-block pj-block--section pj-introduce--section">
    <div class="pj-container">
      <div class="pj-introduce--content">
        <?php if(!empty($headline)) { ?>
          <h3 class="pj-introduce--headline">
            <?php echo $headline; ?>
          </h3>
        <?php } ?>

        <?php if(!empty($description)) { ?>
          <div class="pj-introduce--desc">
            <?php echo $description; ?>
          </div>
        <?php } ?>

        <?php if(!empty($feature_list)){ ?>
          <div class="pj-introduce--featrue-list">
            <?php foreach ($feature_list as $feature) { ?>
              <div class="pj-introduce--featrue-item">
                <?php if(!empty($feature['image'])){ ?>
                  <img src="<?php echo $feature['image']['url'] ?>" class="pj-featue-image" alt="<?php echo $feature['image']['title'] ?>">
                <?php } ?>
                <?php if(!empty($feature['title'])){ ?>
                  <div class="pj-featue-title">
                    <?php echo $feature['title']; ?>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if(!empty($cta_button) && !empty($cta_button['title'])) { ?>
          <a class="pj-introduce--btn pj-btn" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>">
            <?php echo $cta_button['title']; ?>
          </a>
        <?php } ?>
      </div>
    </div>
</section>
