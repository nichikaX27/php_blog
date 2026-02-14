<h2>記事の編集</h2>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('id', array('type' => 'hidden')); 
echo $this->Form->input('title', array('label' => 'タイトル'));
echo $this->Form->input('body', array('label' => '本文', 'rows' => '3'));
echo $this->Form->end('更新する' );
?>

<p><?php echo $this->Html->link(
    '更新せずに記事一覧へ戻る', 
    array('action' => 'index'),
    array(),
    '更新せずに記事一覧へ戻りますか？'
    ); ?>
</p>