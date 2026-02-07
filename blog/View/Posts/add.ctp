<h2>記事の追加</h2>
<?php
echo $this->Form->create('Post'); 
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label' => '本文', 'rows' => '3'));
echo $this->Form->end('保存する'); // 送信ボタン ＋ </form>タグ終了
?>