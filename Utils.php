<?php 

namespace Twig\Blank;

class Utils extends \Twig_Extension
{

  	public function getName()
    {
        return 'twig_utils';
    }

    public function getFunctions()
    {
		return array(
            'file_exists' => new \Twig_Function_Function('file_exists'),
            'getUrl' => new \Twig_Function_Method($this, 'get_url'),
            'handlized' => new \Twig_Function_Method($this, 'handlized'),
            'icons' => new \Twig_Function_Method($this, 'icons', array('is_safe' => array('html')))
        );
    }
    public function handlized($str)
    {
        $str = str_replace('<br/>', '-', $str);
        $str = strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($str, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
        return $str;
    }
    public function icons($name)
    {
        $html = '<svg class="icon ' . $name . '">';
        $html .= '  <use xlink:href="#' . $name . '"></use>';
        $html .= '</svg>';
        return $html;
    }
    public function get_url()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
}