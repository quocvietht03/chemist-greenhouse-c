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
$pd_top = get_field('padding_top');
$pd_bottom = get_field('padding_bottom');

$style = array();
if(!empty($bg_color)) {
  $style[] = "background-color: {$bg_color}";
}

if(!empty($bg_image)) {
  $style[] = "background-image: url({$bg_image})";
}

if(!empty($pd_top)) {
  $style[] = "padding-top: {$pd_top}px";
}

if(!empty($pd_bottom)) {
  $style[] = "padding-bottom: {$pd_bottom}px";
}

$style_md = array();
if(!empty($pd_top)) {
  $style_md[] = "padding-top: calc({$pd_top}px * 0.75)";
}

if(!empty($pd_bottom)) {
  $style_md[] = "padding-bottom: calc({$pd_bottom}px * 0.75)";
}

$style_sm = array();
if(!empty($pd_top)) {
  $style_sm[] = "padding-top: calc({$pd_top}px * 0.55)";
}

if(!empty($pd_bottom)) {
  $style_sm[] = "padding-bottom: calc({$pd_bottom}px * 0.55)";
}

if(!empty($style)) {
  echo '<style>';
  echo '#pj-hero--' . $block['id'] . '{' . implode(';', $style) . '}';
  if(!empty($style_md)) {
    echo '@media(max-width: 991.98px) {
            #pj-hero--' . $block['id'] . '{' . implode(';', $style_md) . '}
          }';
  }
  if(!empty($style_sm)) {
    echo '@media(max-width: 767.98px) {
            #pj-hero--' . $block['id'] . '{' . implode(';', $style_sm) . '}
          }';
  }
  echo '</style>';
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
