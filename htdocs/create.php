<?php

require_once 'App.php';

class Page_Create extends App_Page
{
    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->_header = BEAR::dependency('BEAR_Page_Header');
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Post')->build();
    }

    public function onOutput()
    {
        $this->set('title', 'New Post');
        $this->display('create.tpl');
    }

    public function onAction(array $submit)
    {
        $params = array(
            'uri' => 'Post',
            'values' => $submit
        );
        $this->_resource->create($params)->request();
        $this->_header->redirect('/index.php');
    }
}

App_Main::run('Page_Create');
?>
