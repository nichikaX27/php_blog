<table>
    <tr>
        <th>タイトル</th>
        <th>作成日</th>
    </tr>
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo h($post['Post']['title']); ?></td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>