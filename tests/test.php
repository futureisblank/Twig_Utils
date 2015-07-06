<?php 

require dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php'; // Autoload files using Composer autoload

echo \Blank\Component::getName();