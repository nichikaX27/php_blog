<?php
class PostsController extends AppController {
    // public $scaffold;
    public $helpers = array('Html', 'Form');
    //記事一覧表示
    public function index(){
        
        $params = array(
            'order' => 'modified desc',
            'limit' => 10
        );
    $this->set('posts', $this->Post->find('all', $params));

    }

    //記事の詳細表示
    public function view($id = null){
    $this->Post->id = $id;

    if(!$this->Post->exists()){
        throw new NotFoundException('記事が見つかりません');
    }
    $this->set('post', $this->Post->read());

    $this->set('title', $this->Post->field('title'));
    }    

    //記事の追加
     public function add() {
    // フォームからデータが送られてきた（POSTされた）場合のみ実行
    if ($this->request->is('post')) {
        // データを保存する
        if ($this->Post->save($this->request->data)) {
            // 成功メッセージを表示
            $this->Session->setFlash('記事を保存しました！', 'default', array('class' => 'success'));
            // 一覧画面にリダイレクト
            return $this->redirect(array('action' => 'index'));
        }
    }
  }

    public function edit($id = null) {

    $this->Post->id = $id;

    if (!$this->Post->exists()) {
        throw new NotFoundException('記事が見つかりません');
    }

    if($this->request->is("get")){
        $this->request->data = $this->Post->read();
    } else {
        if($this->Post->save($this->request->data)){
            $this->Session->setFlash('記事を更新しました！', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
        }
    }
        
    }

}
