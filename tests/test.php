<?php 

require dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php'; // Autoload files using Composer autoload
use Blank\Component;

echo Blank\Component::getName();