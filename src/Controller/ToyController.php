<?php
/**
 * @file
 * Contains \Drupal\toy\Controller\ToyController.
 */

namespace Drupal\toy\Controller;

use Drupal\Core\Controller\ControllerBase;

class ToyController extends ControllerBase {

  /**
  * Content page of Toy module
  * @return array
  */
  public function page() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Toy Controller content'),
    );
  }

}
