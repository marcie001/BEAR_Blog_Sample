<table>
    <tr>
        <td>Id</td>
        <td>Title</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>CreatedAt</td>
    </tr>
    <!-- ここから、posts配列をループして、投稿記事の情報を表示 -->
    {foreach from=$body item=post}
    <tr>
        <td>{$post.id}</td>
        <td><a href="item.php/?id={$post.id}">{$post.title|escape}</a></td>
        <td><a href="update.php/?id={$post.id}">編集</a></td>
        <td><a href="delete.php/?id={$post.id}">削除</a></td>
        <td>{$post.created|date_format:"%Y/%m/%d %H:%M"}</td>
    </tr>
    {foreachelse}
    <tr>
        <td colspan="3">No posts found</td>
    </tr>
    {/foreach}
</table>
