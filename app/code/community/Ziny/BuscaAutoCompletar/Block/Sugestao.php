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
class Ziny_BuscaAutoCompletar_Block_Sugestao extends Mage_Core_Block_Template {

    public function _prepareLayout() {

        return parent::_prepareLayout();
    }

    public function getSearchautocomplete() {

        if (!$this->hasData('buscaautocompletar')) {

            $this->setData('buscaautocompletar', Mage::registry('buscaautocompletar'));
        }
        return $this->getData('buscaautocompletar');
    }

    public function sugestoesProdutos() {

        $query = Mage::helper('catalogsearch')->getQuery();

        $query->setStoreId(Mage::app()->getStore()->getId());

        if ($query->getRedirect()) {

            $query->save();
        } else {
            $query->prepare();
        }
        Mage::helper('catalogsearch')->checkNotes();

        $resultados = $query->getResultCollection();

        $resultados->addAttributeToFilter('visibility', array('neq' => 1));

        if (Mage::getStoreConfig('buscaautocompletar/resultado/qtd_produtos')) {

            $resultados->setPageSize(Mage::getStoreConfig('buscaautocompletar/resultado/qtd_produtos'));
        } else {
            $resultados->setPageSize(5);
        }
        $resultados->addAttributeToSelect('description');
        $resultados->addAttributeToSelect('name');
        $resultados->addAttributeToSelect('thumbnail');
        $resultados->addAttributeToSelect('small_image');
        $resultados->addAttributeToSelect('url_key');

        return $resultados;
    }

    public function sugestoesCategorias() {

        $categories = Mage::getModel('catalog/category')->getCollection();

        foreach ($categories as $cat) {

            $temp = null;
            $_temp = null;
            $are = false;
            $_cat = $cat->load();
            
            $temp['titulo'] = $_cat->getName();
            $temp['url'] = $_cat->getUrl();

            $prod = $_cat->getProductCollection()->addAttributeToFilter('name', array('like' => '%' . $this->getRequest()->getParam('q') . '%'));

            $prod->addAttributeToFilter('visibility', array('neq' => 1));

            $prod->setPageSize(5);

            foreach ($prod as $p) {
                
                $_temp[] = $p->load();
                $are = true;
            }
            if ($are) {
                $temp[] = $_temp;
                $resultado[] = $temp;
            }
        }
        return $resultado;
    }

    public function sugestaoAtiva() {

        return Mage::getStoreConfig('buscaautocompletar/sugestao/ativo');
    }
    
    public function categoriaAtiva(){
        
        return Mage::getStoreConfig('buscaautocompletar/categoria/ativa');
    }

    public function resultadoAtivo() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/ativo');
    }

    public function imagemLargura() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/imagem_largura');
    }

    public function imagemAltura() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/imagem_altura');
    }

    public function imagemAtiva() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/exibir_imagem');
    }

    public function nomeAtivo() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/exibir_nome');
    }
	
    public function descricaoAtiva() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/exibir_descricao');
    }

    public function qtdDescricao() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/qtd_descricao');
    }

    public function getImagemBordaLargura() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/imagem_borda_largura');
    }

    public function getImagemBordaCor() {

        return Mage::getStoreConfig('buscaautocompletar/resultado/imagem_borda_cor');
    }
    
    public function categoriaOculta($categoria) {
        
        $dados = Mage::getStoreConfig('buscaautocompletar/categoria/esconde_categoria');
        $lista = array_map('trim', explode(',', $dados));
        
        if (!in_array(trim($categoria), $lista)){
            
            return true;
        }
        return false;
    }
}
