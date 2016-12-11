<?php
namespace Drupal\toy\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
/**
 * Provides a 'Toy' Block
 *
 * @Block(
 *   id = "toy_block",
 *   admin_label = @Translation("Toy"),
 * )
 */
 class ToyBlock extends BlockBase implements BlockPluginInterface {

   /**
     * {@inheritdoc}
     */
   public function build() {

    $config = $this->getConfiguration();

    $content = !empty($config['content']) ? $config['content'] : 'Toy Block Content';
    $footer = !empty($config['footer']) ? $config['footer'] : 'Toy Block Footer';

    return array(
              '#markup' => '<div id="toy_block_content">' . $content . '</div>
                                <footer><small>' . $footer . '</small></footer>'
    );
   }

   /**
 * {@inheritdoc}
 */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['toy_block_content'] = array (
      '#type' => 'textarea',
      '#title' => $this->t('content'),
      '#description' => $this->t('Insert content of block here.'),
      '#default_value' => isset($config['content']) ? $config['content'] : 'Toy block content',
    );

    $form['toy_block_footer'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Footer'),
      '#description' => $this->t('Insert an footer text here.'),
      '#default_value' => isset($config['footer']) ? $config['footer'] : 'Toy block footer',
    );

    return $form;
  }

  /**
  * {@inheritdoc}
  */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('content', $form_state->getValue('toy_block_content'));
    $this->setConfigurationValue('footer', $form_state->getValue('toy_block_footer'));
  }

  /**
  * {@inheritdoc}
  */
  public function defaultConfiguration() {
    $default_config = \Drupal::config('toy.settings');
    return array(
      'footer' => $default_config->get('toy.footer'),
      'content' => $default_config->get('toy.content')
    );
  }

 }
