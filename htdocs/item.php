<?php
require_once 'App.php';

class Page_Item extends App_Page
{
    public function onInject() 
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->injectGet('id', 'id', null);
    }

    /**
     * @required id
     */
    public function onInit(array $args) 
    {
        $options = array(
            'cache' => array(
                'life' => 60
            )
        );
        $params = array(
            'uri' => 'Post',
            'values' => $args,
            'options' => $options
        );
        $postRo = $this->_resource->read($params);
        $post = $postRo->getBody();
        $this->set('layout', array('title' => $post['title'] . " :BEAR Blog"));

        $params['options']['template'] = 'item';
        $this->_resource->read($params)->set('post');
    }

    public function onOutput()
    {
        $this->display('item.tpl');
    }
}

App_Main::run('Page_Item');
