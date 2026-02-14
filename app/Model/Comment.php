<?php 
class Comment extends AppModel{
    public $belongsTo = "Post";

    public $validate = array(

        'author' => array(
            'rule' => 'notBlank',
            'message' => '投稿者名を入力してください'
        ),
        'maxLength' => array(
            'rule' => array('maxLength', 20),
            'message' => '投稿者名は20文字以内で入力してください'
        ),

        'body' => array(
            'rule' => 'notBlank',
            'message' => 'コメント本文を入力してください'
        ),
            'maxLength' => array(
                'rule' => array('maxLength', 200),
                'message' => 'コメント本文は200文字以内で入力してください'
            )

    );
}