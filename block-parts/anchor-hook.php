<?php
/**
 * Block Name: Anchor Hook
**/

$anchor_id = get_field('anchor_id');
if(!empty($anchor_id)) {
  echo '<div id="' . $anchor_id . '" class="pj-anchor-hook">Enter link #anchor_id to scroll here.</div>';
}
