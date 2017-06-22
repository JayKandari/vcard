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
 *     "vcard"
 *   }
 * )
 */
class VcardWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $name = isset($items[$delta]->name) ? $items[$delta]->name : '';
    $company = isset($items[$delta]->company) ? $items[$delta]->company : '';

    $element['name'] = [
      '#type' => 'textfield',
      '#title' => 'Name',
      '#default_value' => $name,
    ];
    $element['company'] = [
      '#type' => 'textfield',
      '#title' => 'Company',
      '#default_value' => $company,
    ];

    $element += [
      '#type' => 'fieldset',
      '#description' => $this->t('vCard Field'),
    ];

    return $element;
  }

}
