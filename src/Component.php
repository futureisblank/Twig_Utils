<?php namespace Blank;

use \Twig_Extension;

class Component extends \Twig_Extension
{

    // function __construct(){
    //     spl_autoload_register(__NAMESPACE__ . "\\Component");
    // }

    // public static function autoload($className)
    // {   
    //     var_dump($className);
    //     $className = ltrim($className, '\\');
    //     $fileName  = '';
    //     $namespace = '';
    //     if ($lastNsPos = strrpos($className, '\\')) {
    //         $namespace = substr($className, 0, $lastNsPos);
    //         $className = substr($className, $lastNsPos + 1);
    //         $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    //     }
    //     $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    //     require $fileName;
    // }

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
