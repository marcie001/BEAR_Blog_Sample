<?php

require_once 'App.php';

class Page_Index extends App_Page
{
    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
    }

    public function onInit(array $args)
    {
        $params = array(
            'uri' => 'Post',
            'options' => array('template' => 'post')
        );
        $this->_resource->read($params)->set('post');
    }

    public function onOutput()
    {
        $this->display('index.tpl');
    }
}

App_Main::run('Page_Index');
?>
