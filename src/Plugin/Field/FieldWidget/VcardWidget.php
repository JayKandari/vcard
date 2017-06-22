<?php

namespace Drupal\vcard\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'field_example_text' widget.
 *
 * @FieldWidget(
 *   id = "vcard_widget",
 *   module = "vcard",
 *   label = @Translation("vCard Widget"),
 *   field_types = {
 *     "text_with_summary"
 *   }
 * )
 */
class VcardWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += array(
      '#type' => 'textarea',
      '#default_value' => $value,
      '#suffix' => '<div>this is a vCard Widget.</div>',
    );
    return array('value' => $element);
  }

}
