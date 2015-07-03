<?php 

namespace \Blank;

class Components extends \Twig_Extension
{

  	public static function getName()
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