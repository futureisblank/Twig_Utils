<?php 

require dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php'; // Autoload files using Composer autoload

use \Twig\Blank\Component;

echo \Twig\Blank\Component::getName();