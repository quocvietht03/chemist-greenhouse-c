<?php
/**
 * Block Name: Hero Section
**/

$headline = get_field('headline');
$sub_headline = get_field('sub_headline');
$description = get_field('description');
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
  echo '<style>#pj-hero--' . $block['id'] . '{' . implode(';', $style) . '}</style>';
}
?>
<section id="<?php echo 'pj-hero--' . $block['id']; ?>" class="pj-block pj-hero--section">
    <div class="pj-container">
      <div class="pj-hero--content">
        <?php if(!empty($headline)) { ?>
          <h1 class="pj-hero--headline">
            <?php echo $headline; ?>
          </h1>
        <?php } ?>

        <?php if(!empty($sub_headline)) { ?>
          <h2 class="pj-hero--sub-headline">
            <?php echo $sub_headline; ?>
          </h2>
        <?php } ?>

        <?php if(!empty($description)) { ?>
          <div class="pj-hero--desc">
            <?php echo $description; ?>
          </div>
        <?php } ?>
        <?php if(!empty($cta_button) && !empty($cta_button['title'])) { ?>
          <a class="pj-hero--btn pj-btn pj-btn--yellow" href="<?php echo $cta_button['url']; ?>" target="<?php echo $cta_button['target']; ?>">
            <?php echo $cta_button['title']; ?>
          </a>
        <?php } ?>
      </div>
    </div>
</section>
