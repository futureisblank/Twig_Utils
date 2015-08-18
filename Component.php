<?php

namespace Twig\Blank;


/**
 * Slim - a micro PHP 5 framework
 *
 * @package     TwigBlank
 *
 */

class Component extends \Twig_Extension
{

    public function getName()
    {
        return 'twig_components';
    }

    public function getFunctions()
    {
        return array(
            'component' => new \Twig_Function_Method($this, 'get_component', array('is_safe' => array('html'),'needs_environment' => true)),
            'component_exist' => new \Twig_Function_Method($this, 'component_exist', array('is_safe' => array('html'),'needs_environment' => true))
        );
    }

    public function get_component(\Twig_Environment $twig, $name, $data)
    {
        $path = explode( '/',$name);
        if( count($path) > 1 ){
           $html = $twig->render( $name.'.html.twig', $data );
        }else {
           $html = $twig->render('components/'.$name.'.html.twig', $data );
        }
        return $html;
    }

    public function component_exist(\Twig_Environment $twig, $name)
    {
        $path = explode( '/',$name);
        if( count($path) > 1 ){
            if( file_exists('App/views/' . $name . '.html.twig') ) {
                return true;
            } else {
                return false;
            }
        }else {
            if( file_exists('components/'.$name.'.html.twig') ) {
                return true;
            } else {
                return false;
            }
        }
    }
}
