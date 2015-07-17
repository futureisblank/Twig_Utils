<?php 

namespace Twig\Blank;

class Utils extends \Twig_Extension
{

  	public function getName()
    {
        return 'twig_utils';
    }

    // Translations

    public function setTranslations ($translations)
    {
        $this->translations = $translations;

    }


    // Register functions

    public function getFunctions()
    {
		return array(
            'file_exists' => new \Twig_Function_Function('file_exists'),
            'print_r' => new \Twig_Function_Function('print_r'),
            'var_dump' => new \Twig_Function_Function('var_dump'),
            'echo' => new \Twig_Function_Function('echo'),
            'die' => new \Twig_Function_Function('die'),
            'substr' => new \Twig_Function_Function('substr'),

            'handleize' => new \Twig_Function_Method($this, 'handleize'),
            'getUrl' => new \Twig_Function_Method($this, 'get_url'),
            'icons' => new \Twig_Function_Method($this, 'icons', array('is_safe' => array('html'))),

            'translations' => new \Twig_Function_Method($this, 'translations')
        );
    }


    // Register filters

    public function getFilters()
    {
        return array(
            'handleize' => new \Twig_Filter_Method($this, 'handleize'),
            'translate' => new \Twig_Filter_Method($this, 'translate')
        ); 
    }

    // Functions

    public function handleize($str)
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

    public function translate($key)
    {   
        if (array_key_exists($key, $this->translations)){
            return $this->translations->{$key};
        }
        else {
            return $key;
        }
    }

    public function translations()
    {
        print_r($this->translations);
    }

}