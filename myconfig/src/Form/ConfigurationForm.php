<?php
namespace Drupal\myconfig\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ConfigurationForm.
 */
class ConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'myconfig.configuration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'myconfig_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('myconfig.configuration');
    $form['config_input_1'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Config Input 1'),
      '#description' => $this->t('Sample Text Input 1'),
      '#default_value' => $config->get('config_input_1'),
    ];
    $form['config_input_2'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Config Input 2'),
      '#description' => $this->t('Sample Text Input 2'),
      '#default_value' => $config->get('config_input_2'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('myconfig.configuration')
      ->set('config_input_1', $form_state->getValue('config_input_1'))
      ->set('config_input_2', $form_state->getValue('config_input_2'))
      ->save();
  }

}
?>