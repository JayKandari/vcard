<?php

namespace Drupal\vcard\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'vcard_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "vcard_formatter",
 *   module = "vcard",
 *   label = @Translation("Simple vcard formatter"),
 *   field_types = {
 *     "text_with_summary"
 *   }
 * )
 */
class VcardFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
        '#theme' => 'styleone',
        '#contact' => ['title' => 'abracadabra'],
        // '#markup' => '<h1>Items value is - </h1><u>' . $item->value . '</u>',
      ];
    }

    return $elements;
  }

}
