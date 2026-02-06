<?php
class PostsController extends AppController {
    // public $scaffold;
    public $helpers = array('Html', 'Form');
    public function index(){
        
        $params = array(
            'order' => 'modified desc',
            'limit' => 2
        );
    $this->set('posts', $this->Post->find('all', $params));

    }

    public function view($id = null){
    $this->Post->id = $id;

    if(!$this->Post->exists()){
        throw new NotFoundException('記事が見つかりません');
    }
    $this->set('post', $this->Post->read());

    $this->set('title', $this->Post->field('title'));
    }    

}