<?php $this->assign('title', '記事一覧'); ?>
<table>
    <h2>記事一覧</h2>
    <p><?php echo $this->Html->link(
        '新規記事作成',
        array('action' => 'add'),
        array('class' => 'btn')
    ); ?>
    </p>

    <tr>
        <th>タイトル</th>
        <th>作成日</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr id ="post-<?php echo h($post['Post']['id']); ?>">
            <td>
                <?php echo $this->Html->link(
                    h($post['Post']['title']),
                    array('action' => 'view', $post['Post']['id'])
                ); ?>

            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>

            <td>
                <?php echo $this->Html->link(
                    '編集',
                    array('action' => 'edit', $post['Post']['id']),
                    array('class' => 'btn')
                ); ?>
            </td>

            <td>
                <?php echo $this->Form->postLink(
                    '削除',
                    array('action' => 'delete', $post['Post']['id']),
                    array('class' => 'btn delete-link','style' => 'background: #e32;'),
                    '本当に削除してもよろしいですか？'
                ); ?>
            </td>


        </tr>
    <?php endforeach; ?>
</table>

 <!-- 以下,Ajaxによる非同期削除処理 -->
<script>
$(function() {
    $('a.btn[onclick*="post"]').attr('onclick', '').click(function(e) {
        e.preventDefault(); 

        if (confirm('本当に削除しますか？')) { 
            var $link = $(this);
            var $row = $link.closest('tr');
            var url = $link.prev('form').attr('action');

            $.post(url, function() {
                $row.fadeOut('slow', function() {
                    $(this).remove();
                });
            });
        }
    });
});
</script>