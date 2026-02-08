<?php $this->assign('title', '記事一覧'); ?>
<table>
    <h2>記事一覧</h2>
    <p><?php echo $this->Html->link('新規記事作成', 
            array('action' => 'add'), 
            array('class' => 'btn')); ?>
    </p>
    <tr>
        <th>タイトル</th>
        <th>作成日</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td>
                <?php echo $this->Html->link(h($post['Post']['title']), 
                array('action' => 'view', $post['Post']['id'])); ?>

            </td>
            <td>
                <?php echo $post['Post']['created']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>