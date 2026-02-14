<h2><?php echo h($post['Post']['title']); ?></h2>
<p><?php echo h($post['Post']['body']); ?></p>

<h2>Comments</h2>
<ul>
<?php foreach ($post['Comment'] as $comment): ?>
    <li>
        <strong><?php echo h($comment['author']); ?>さん:</strong>
        <?php echo h($comment['body']); ?>

        <?php echo $this->Form->postlink(
            '削除',
            array('controller' => 'comments', 'action' => 'delete', $comment['id']),
            array('class' => 'comment-delete', 'style' => 'color:#e32; font-size:0.8em; margin-left:10px;'),
            'このコメントを削除しますか？'
        );
        ?>

    </li>
<?php endforeach; ?>
</ul>

<h2>Add Comment</h2>
<?php

echo $this->Form->create('Comment', array('url' => array('controller' => 'comments', 'action' => 'add')));
echo $this->Form->input('author', array('label' => '投稿者名'));
echo $this->Form->input('body', array('rows' => 3, 'label' => 'コメント本文'));
echo $this->Form->input('Comment.post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));
echo $this->Form->end('コメントを投稿する');
?>

<p><?php echo $this->Html->link('記事一覧へ戻る', array('action' => 'index')); ?></p>

<script>
    $(function(){
        $('.comment-delete').attr('onclick','').click(function(e){
            e.preventDefault();

            if(confirm('このコメントを削除しますか？')){
                var $link = $(this);
                var $target = $link.closest('li');
                var url = $link.prev('form').attr('action');

                $.post(url, function(){
                    $target.fadeOut('slow', function(){
                        $target.remove();
                    });
                });
            }
            return false;
        });
    })
</script>