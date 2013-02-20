<?php

require_once 'App.php';

class Page_Update extends App_Page
{
    private $_id;

    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        $this->injectGet('id', 'id');
    }

    public function onInit(array $args)
    {
        $this->_id = $args['id'];
        $params = array(
                    'uri' => 'Post',
                    'values' => array('id' => $args['id'])
        );
        $post = $this->_resource->read($params)->getBody();
        BEAR::dependency('App_Form_Post')->build($post);
    }

    public function onOutput()
    {
        $this->set('title', 'Edit A Post');
        $this->display('create.tpl');
    }

    public function onAction(array $submit)
    {
        $submit['id'] = $this->_id;
        $params = array(
            'uri' => 'Post',
            'values' => $submit
        );
        $this->_resource->update($params)->request();
        $this->_header->redirect('/index.php');
    }
}

App_Main::run('Page_Update');
