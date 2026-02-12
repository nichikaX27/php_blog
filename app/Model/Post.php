<?php
class Post extends AppModel {

public $validate = array(
    'title' => array(
        'rule' => 'notBlank',
        'message' => 'タイトルを入力してください'
    ),
    'body' => array(
        'rule' => 'notBlank',
        'message' => '本文を入力してください'
)
);

public $hasMany = array (
    'Comment' => array(
        'className' => 'Comment',
        'dependent' => true
    )
);

}