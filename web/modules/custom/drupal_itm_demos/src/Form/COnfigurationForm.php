<?php

namespace Drupal\drupal_itm_demos\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class COnfigurationForm.
 */
class COnfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drupal_itm_demos.configuration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'c_onfiguration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drupal_itm_demos.configuration');
    $form['favorite_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter favorite color'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('favorite_color'),
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

    $this->config('drupal_itm_demos.configuration')
      ->set('favorite_color', $form_state->getValue('favorite_color'))
      ->save();
  }

}
