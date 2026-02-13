<?php

class CommentsController extends AppController {
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash('コメントを投稿しました！');
            } else {
                $this->Session->setFlash('投稿に失敗しました');
            }
            // 投稿した記事の詳細画面に戻る
            return $this->redirect(array(
                'controller' => 'posts', 
                'action' => 'view', 
                $this->request->data['Comment']['post_id']
            ));
        }
    }

    public function delete($id = null){
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        if($this->Comment->delete($id)){
            if($this->request->is('ajax')){
                $this->autoRender = false;
                return true;
            } else {
                $this->Session->setFlash('コメントを削除しました。', 'default', array('class' => 'success'));
                return $this->redirect($this->referer());
            }
        }
    }
}