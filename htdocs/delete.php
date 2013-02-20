<?php

require_once 'App.php';

class Page_Delete extends App_Page
{
    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        $this->injectGet('id', null);
    }

    /**
     * @required id
     */
    public function onInit(array $args)
    {
        $params = array(
            'uri' => 'Post',
            'values' => array('id' => $args['id']),
            'options' => array('template' => 'post')
        );
        $this->_resource->delete($params)->request();
    }

    public function onOutput()
    {
        $this->_header->redirect('/index.php');
    }
}

App_Main::run('Page_Delete');
?>
