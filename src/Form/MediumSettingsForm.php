<?php

namespace Drupal\config_translations_example\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Example Medium Settings Form.
 */
class MediumSettingsForm extends ConfigFormBase {

  const CONFIG_SETTINGS_NAME = 'config_translations_example.medium_settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_translations_example_medium_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      self::CONFIG_SETTINGS_NAME,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config_settings = $this->config(self::CONFIG_SETTINGS_NAME);

    $form['config_settings'] = [
      '#tree' => TRUE,
      'example' => [
        '#type' => 'fieldset',
        '#title' => $this->t('Example Text Field Settings'),
        'lorum_text' => [
          '#type' => 'textfield',
          '#title' => $this->t('Lorum Text'),
          '#default_value' => $config_settings->get('example.lorum_text'),
        ],
        'sample_text' => [
          '#type' => 'textarea',
          '#title' => $this->t('Sample Text'),
          '#default_value' => $config_settings->get('example.sample_text'),
        ],
      ],
      'example_field_types' => [
        '#type' => 'fieldset',
        '#title' => $this->t('Example Field Types'),
        'status' => [
          '#type' => 'checkbox',
          '#title' => $this->t('Status'),
          '#default_value' => $config_settings->get('example_field_types.status'),
        ],
        'color' => [
          '#type' => 'checkboxes',
          '#title' => $this->t('Color'),
          '#description' => $this->t('Choose more than one color'),
          '#default_value' => $config_settings->get('example_field_types.color'),
          '#options' => [
            'red' => $this->t('Red'),
            'black' => $this->t('Black'),
            'green' => $this->t('Green'),
          ],
        ],
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config(self::CONFIG_SETTINGS_NAME)->setData(
      $form_state->getValue('config_settings')
    )->save();

    parent::submitForm($form, $form_state);
  }

}
