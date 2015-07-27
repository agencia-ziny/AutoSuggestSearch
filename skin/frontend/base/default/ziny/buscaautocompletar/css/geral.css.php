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
 * @category   skin
 * @package    default_ziny
 * @copyright  Copyright (c) 2015 Agência Ziny (www.agenciaziny.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Agência Ziny <dev@agenciaziny.com.br>
 */

define('MAGENTO_ROOT', (dirname(__FILE__).'../../../../../../../../'));

require_once MAGENTO_ROOT . 'app/Mage.php';

umask(0);
Mage::app();

$config = Mage::getStoreConfig('buscaautocompletar/definicoes');
$sugere = Mage::getStoreConfig('buscaautocompletar/sugestao');
$result = Mage::getStoreConfig('buscaautocompletar/resultado');
$catego = Mage::getStoreConfig('buscaautocompletar/categoria');

header("Content-type: text/css; charset: UTF-8");
?>
._esconde {
    display:none
}
._autobuscacompletar {
    border:solid <?php echo $config['borda_largura']; ?>px
}
._autobuscacompletar ._sugestoes {
    background-color:#<?php echo $sugere['background']; ?>;
}
._autobuscacompletar ._sugestao { 
    color:#<?php echo $sugere['sugestao_cor']; ?>
}
._autobuscacompletar ._sugestao ._total {
    color:#<?php echo $sugere['total_cor']; ?>
}
._autobuscacompletar ._resultado { 
    background-color:#<?php echo $result['background']; ?>
}
._autobuscacompletar ._resultado:after {
    content: "";
    display: table;
    clear: both;
}
._autobuscacompletar ._resultado a span._titulo, ._autobuscacompletar ._resultado a {
    color:#<?php echo $result['titulo_cor']; ?>
}
._autobuscacompletar ._resultado span._descricao {
    color:#<?php echo $result['descricao_cor']; ?>
}
._autobuscacompletar ._resultado img {
    float:left;
    margin:3px 6px 3px 0;
    border:solid <?php echo $result['imagem_borda_largura']; ?>px #<?php echo $result['imagem_borda_cor']; ?>
}
._autobuscacompletar li.selected, ._autobuscacompletar li:hover {
    background-color:#<?php echo $config['hover_fundo']; ?>;
    text-decoration:none
}
._autobuscacompletar ._total {
    float: right;
}
._autobuscacompletar li._categoria a span._titulo, ._autobuscacompletar li._categoria a {
    color:#<?php echo $catego['titulo_cor']; ?>;
    text-decoration:none
}
._autobuscacompletar li._categoria ._total {
    color:#<?php echo $catego['total_cor']; ?>
}
._autobuscacompletar li._categoria {
    background-color:#<?php echo $catego['hover_fundo']; ?>
}
._autobuscacompletar li._categoria {
    background-color:#<?php echo $catego['background']; ?>
}
._autobuscacompletar li._categoria.selected, ._autobuscacompletar li._categoria:hover {
    background-color:#<?php echo $catego['hover_fundo']; ?>
}