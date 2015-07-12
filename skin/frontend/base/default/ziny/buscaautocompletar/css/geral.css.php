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

$config = Mage::getStoreConfig('buscaautocompletar/settings');
$sugere = Mage::getStoreConfig('searchautocomplete/suggest');
$result = Mage::getStoreConfig('searchautocomplete/preview');
$catego = Mage::getStoreConfig('searchautocomplete/categoria');

header("Content-type: text/css; charset: UTF-8");
?>
._autobuscacompletar {
    border:solid <?php echo $config['border_width']; ?>px
}
._autobuscacompletar ._sugestao {
    background:<?php echo $sugere['background']; ?>; 
    color:<?php echo $sugere['suggest_color']; ?>
}
._autobuscacompletar ._sugestao ._total {
    color:<?php echo $sugere['count_color']; ?>
}
._autobuscacompletar ._resultado { 
    background:<?php echo $result['background']; ?>
}
._autobuscacompletar ._resultado:after {
    content: "";
    display: table;
    clear: both;
}
._autobuscacompletar ._resultado a {
    color:<?php echo $result['pro_title_color']; ?>
}
._autobuscacompletar ._resultado ._titulo {
    color:<?php echo $result['titulo_cor']; ?>
}
._autobuscacompletar ._resultado ._descricao {
    color:<?php echo $result['pro_description_color']; ?>
}
._autobuscacompletar ._resultado img {
    float:left; 
    border:solid <?php echo $result['image_border_width']; ?>px <?php echo $result['image_border_color']; ?>
}
.header .form-search ._autobuscacompletar li.selected {
    background-color:<?php echo $config['hover_background']; ?>
}
        