<?php namespace Blank;

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/autoload.php'; // Autoload files using Composer autoload

class Component extends \Twig_Extension
{

  	public function getName()
    {
        return 'twig_components';
    }

    public function getFunctions()
    {
		return array(
            'component' => new \Twig_Function_Method($this, 'get_component', array('is_safe' => array('html'),'needs_environment' => true))
        );
    }

    public function get_component(\Twig_Environment $twig, $name, $data)
    {
    	$html = $twig->render('components/'.$name.'.html.twig', $data );
    	return $html;
    }
}
