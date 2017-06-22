<?php

namespace Drupal\vcard\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

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
      $selected_theme = $this->getSetting('theme');
      $elements[$delta] = [
        '#theme' => $selected_theme,
        '#contact' => ['title' => 'abracadabra'],
        // '#markup' => '<h1>Items value is - </h1><u>' . $item->value . '</u>',
      ];
    }

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  static public function defaultSettings() {
    return [
      'theme' => 'default_vcard'
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = parent::settingsSummary();
    $summary[] = 'vCard Theme: ' . $this->getSetting('theme');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  function settingsForm(array $form, FormStateInterface $form_state) {
    $form = [];
    $theme_options = array_keys(vcard_theme());
    $form['theme'] = array(
      '#title' => t('Theme:'),
      '#type' => 'select',
      '#options' => array_combine($theme_options, $theme_options),
      '#default_value' => $this->getSetting('theme'),
    );

    return $form;
  }
}
