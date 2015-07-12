<?php

/**
 * Busca Auto Completar
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @category   Ziny
 * @package    BuscaAutoCompletar
 * @copyright  Copyright (c) 2015 Agência Ziny (www.agenciaziny.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Agência Ziny <dev@agenciaziny.com.br>
 */
class Ziny_BuscaAutoCompletar_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getSuggestUrl() {

        return $this->_getUrl('buscaautocompletar/suggest/result', array('_secure' => Mage::app()->getFrontController()->getRequest()->isSecure()
        ));
    }

    public function getStyle() {

        $style = '
        <style>
        </style>';

        return $style;
    }

}
