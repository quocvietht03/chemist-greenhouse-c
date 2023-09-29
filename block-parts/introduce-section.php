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

$style = array();
if(!empty($bg_color)) {
  $style[] = "background-color: {$bg_color}";
}

if(!empty($bg_image)) {
  $style[] = "background-image: url({$bg_image})";
}

if(!empty($style)) {
  echo '<style>#pj-introduce--' . $block['id'] . '{' . implode(';', $style) . '}</style>';
}
?>
<section id="<?php echo 'pj-introduce--' . $block['id']; ?>" class="pj-block pj-introduce--section">
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
