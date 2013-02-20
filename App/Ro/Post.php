<?php

class App_Ro_Post extends App_Ro
{
    protected $_table = 'posts';

    public function onInject()
    {
        parent::onInject();

        // ページャ
        $this->_queryConfig['pager'] = 1;
        $this->_queryConfig['perPage'] = 3;

        //ソート
        $id = array('id', 'id', '+');
        $this->_queryConfig['sort'] = array($id);

        $this->_query = BEAR::factory('BEAR_Query', $this->_queryConfig);
    }

    public function onRead($values)
    {
        $sql = "SELECT * FROM posts";
        $result = $this->_query->select($sql, array(), $values);
        return $result;
    }

    /**
     * @required title
     * @required body
     * @aspect before App_Aspect_Created
     * @aspect around App_Aspect_Transaction
     */
    public function onCreate($values)
    {
        $result = $this->_query->insert($values);
    }

    /**
     * @required id
     * @aspect around App_Aspect_Transaction
     */
    public function onDelete($values)
    {
        $where = 'id = ' . $this->_query->quote($values['id'], 'integer');
        $this->_query->delete($where);
    }

    /**
     * @required id
     * @required title
     * @required body
     * @aspect before App_Aspect_Updated
     * @aspect around App_Aspect_Transaction
     */
    public function onUpdate($values)
    {
        $where = 'id = ' . $this->_query->quote($values['id'], 'integer');
        unset($values['id']);
        $result = $this->_query->update($values, $where);
    }
}
