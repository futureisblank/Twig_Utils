<?php 

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php'; // Autoload files using Composer autoload

echo Blank\Components::getName();