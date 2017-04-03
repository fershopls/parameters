<?php

namespace lib;

class Render {

    const DEFAULT_ITEM = array(
        'max' => '',
        'about' => '',
        'default' => '',
        'use' => 'textfield',
    );
    protected $templates_path;

    public function __construct($templates_path)
    {
        $this->templates_path = $templates_path;
    }

    public function compile ($arrayMap)
    {
        $html = "";
        foreach ($arrayMap as $key => $item)
        {
            $item = array_merge(self::DEFAULT_ITEM, $item);
            $item['key'] = $key;
            $html .= $this->render($item);
        }
        return $html;
    }

    public function render ($item)
    {
        $template = $this->getTemplate($item['use']);
        foreach ($item as $key => $value)
            $template = preg_replace('/(\{{2}\s?\$'.$key.'\s?\}{2})/', $value, $template);
        return $template;
    }

    public function getTemplate ($filename)
    {
        $file_path = $this->templates_path . '/' . $filename . '.php';
        return file_exists($file_path)?file_get_contents($file_path):False;
    }

}