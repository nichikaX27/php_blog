<?php 
class Comment extends AppModel{
    public $belongsTo = "Post";

    public $validate = array(

        'author' => array(
            'rule' => 'notBlank',
            'message' => '投稿者名を入力してください'
        ),

        'body' => array(
            'rule' => 'notBlank',
            'message' => 'コメント本文を入力してください'
        )
    );
}