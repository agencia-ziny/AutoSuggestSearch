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
class Ziny_BuscaAutoCompletar_Block_Suggest extends Mage_Core_Block_Template {

    public function _prepareLayout() {

        return parent::_prepareLayout();
    }

    public function getSearchautocomplete() {

        if (!$this->hasData('buscaautocompletar')) {

            $this->setData('buscaautocompletar', Mage::registry('buscaautocompletar'));
        }
        return $this->getData('buscaautocompletar');
    }

    public function getSuggestProducts() {

        $query = Mage::helper('catalogsearch')->getQuery();
        
        $query->setStoreId(Mage::app()->getStore()->getId());

        if ($query->getRedirect()) {
            
            $query->save();
        } else {
            $query->prepare();
        }
        Mage::helper('catalogsearch')->checkNotes();

        $results = $query->getResultCollection(); //->setPageSize(5);tion')->addSearchFilter(Mage::app()->getRequest()->getParam('q'));

        $results->addAttributeToFilter('visibility', array('neq' => 1));

        if (Mage::getStoreConfig('buscaautocompletar/preview/number_product')) {
            
            $results->setPageSize(Mage::getStoreConfig('buscaautocompletar/preview/number_product'));
        } else {
            $results->setPageSize(5);
        }
        $results->addAttributeToSelect('description');
        $results->addAttributeToSelect('name');
        $results->addAttributeToSelect('thumbnail');
        $results->addAttributeToSelect('small_image');
        $results->addAttributeToSelect('url_key');

        return $results;
    }

    public function enabledSuggest() {

        return Mage::getStoreConfig('buscaautocompletar/suggest/enable');
    }

    public function enabledPreview() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/enable');
    }

    public function getImageWidth() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/image_width');
    }

    public function getImageHeight() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/image_height');
    }

    public function getEffect() {
        return Mage::getStoreConfig('buscaautocompletar/settings/effect');
    }

    public function getPreviewBackground() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/background');
    }

    public function getSuggestBackground() {
        
        return Mage::getStoreConfig('buscaautocompletar/suggest/background');
    }

    public function getSuggestColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/suggest/suggest_color');
    }

    public function getSuggestCountColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/suggest/count_color');
    }

    public function getBorderColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/settings/border_color');
    }

    public function getBorderWidth() {
        
        return Mage::getStoreConfig('buscaautocompletar/settings/border_width');
    }

    public function isShowImage() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/show_image');
    }

    public function isShowName() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/show_name');
    }

    public function getProductNameColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/pro_title_color');
    }

    public function getProductDescriptionColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/pro_description_color');
    }

    public function isShowDescription() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/show_description');
    }

    public function getNumDescriptionChar() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/num_char_description');
    }

    public function getImageBorderWidth() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/image_border_width');
    }

    public function getImageBorderColor() {
        
        return Mage::getStoreConfig('buscaautocompletar/preview/image_border_color');
    }

    public function getHoverBackground() {
        
        return Mage::getStoreConfig('buscaautocompletar/settings/hover_background');
    }
}
