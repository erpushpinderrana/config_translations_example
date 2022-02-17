<?php

namespace Drupal\config_translations_example\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Example Basic Settings Form.
 */
class BasicSettingsForm extends ConfigFormBase {

  const CONFIG_SETTINGS_NAME = 'config_translations_example.basic_settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_translations_example_basic_settings';
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
    $form = parent::buildForm($form, $form_state);
    $config_settings = $this->config(self::CONFIG_SETTINGS_NAME);

    $form['example'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Fieldset'),
    ];

    $form['example']['title'] = [
      '#type'          => 'textfield',
      '#title' => $this->t('Title'),
      '#default_value' => $config_settings->get('title'),
    ];

    $form['fruits'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Fruits'),
    ];

    $form['fruits']['select'] = [
      '#type'          => 'select',
      '#options'       => ['strawberry' => $this->t('Strawberry'), 'banana' => $this->t('Banana')],
      '#default_value' => $config_settings->get('select'),
    ];

    $form['home'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Home'),
    ];

    $form['home']['checkbox'] = [
      '#type'          => 'checkbox',
      '#title'         => 'Light me up',
      '#default_value' => $config_settings->get('checkbox'),
    ];

    $form['brands'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Brands'),
    ];

    $form['brands']['checkboxes'] = [
      '#type'          => 'checkboxes',
      '#options'       => ['apple' => $this->t('Apple'), 'microsoft' => $this->t('Microsoft')],
      '#default_value' => $config_settings->get('checkboxes'),
    ];

    $form['energy'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Energy'),
    ];

    $form['energy']['radios'] = [
      '#type'          => 'radios',
      '#options'       => ['coffee' => $this->t('Coffee'), 'tea' => $this->t('Tea')],
      '#default_value' => $config_settings->get('radios'),
    ];

    $form['texts'] = [
      '#type'  => 'details',
      '#open'  => TRUE,
      '#title' => $this->t('Texts'),
    ];

    $form['texts']['message'] = [
      '#type'          => 'textarea',
      '#default_value' => $config_settings->get('message'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $config_settings = $this->configFactory->getEditable(self::CONFIG_SETTINGS_NAME);
    $config_settings->set('title', $form_state->getValue('title'))->save();
    $config_settings->set('select', $form_state->getValue('select'))->save();
    $config_settings->set('radios', $form_state->getValue('radios'))->save();
    $config_settings->set('checkbox', $form_state->getValue('checkbox'))->save();
    $config_settings->set('checkboxes', $form_state->getValue('checkboxes'))->save();
    $config_settings->set('message', $form_state->getValue('message'))->save();

    parent::submitForm($form, $form_state);
  }

}
