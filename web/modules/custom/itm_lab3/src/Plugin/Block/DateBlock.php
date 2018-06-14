<?php

namespace Drupal\itm_lab3\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'DateBlock' block.
 *
 * @Block(
 *  id = "date_block",
 *  admin_label = @Translation("Date block"),
 * )
 */
class DateBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $timestamp = \Drupal::time()->getRequestTime();

    $build = [];
    $build['date_block']['#markup'] = format_date($timestamp, 'long');
    return $build;
  }

}
