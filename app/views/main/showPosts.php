<?php foreach($posts as $post): ?>
	<p><b><a href="/posts/full/?id=<?=$post['id']?>"><?=$post['title']?></a></b></p>
	<p><?=$post['short_content']?></p>
	<hr>
<?php endforeach; ?>

<div class="pagination">
	<?=$pagination?>
</div>