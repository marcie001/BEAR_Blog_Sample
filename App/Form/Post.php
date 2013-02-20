<?php
class App_Form_Post extends BEAR_BAse
{
    public function onInject()
    {
    }

    public function build(array $defaults = null)
    {
        $form = BEAR::factory('BEAR_Form', array('formName' => 'form'));
        if ($defaults) {
            $form->setDefaults($defaults);
        }
        $form->addElement('text', 'title', 'タイトル', 'size=30 maxlength=50');
        $form->addElement('textarea', 'body', '本文', 'cols=30 rows=10');
        // フィルタと検証ルール
        $form->applyFilter('__ALL__', 'trim');
        //$form->applyFilter('__ALL__', 'strip_tags');
        $form->addRule('title', 'タイトルを入力してください', 'required');
        $form->addRule('body', '本文を入力してください', 'required');
        $form->addElement('submit', '_submit', 'Save Post', '');    
    }
}
?>
