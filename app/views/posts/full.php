<?php foreach($posts as $post): ?>
	<p><b><?=$post['title']?></b></p>
	<p><?=$post['full_content']?></p>
	<p>Автор: <?=$post['author']?></p>

	<form action="/posts/delete/" method="post">
		<input type="hidden" name="id" value="<?=$post['id']?>">
		<button type="submit">Удалить</button>
	</form>

	<form action="/posts/edit/" method="post">
		<input type="hidden" name="id" value="<?=$post['id']?>">
		<button type="submit">Редактировать</button>
	</form>
	<hr>
<?php endforeach; ?>

<div class="comments">
	<h2>Комментарии</h2>
	<?php foreach($comment as $post): ?>
		<p><?=$post['content']?></p>
		<hr>
	<?php endforeach; ?>

	<form action="" method="post">
		<input type="hidden" name="post_id" id="post_id" value="<?=$_GET['id']?>">
		<input type="text" name="content" id="content" placeholder="Напишите комментарий">
		<input type="submit">
		<div class="error">
			<?php if(isset($_SESSION['content'])) : ?>
				<?= $_SESSION['content'] ?>
			<?php endif; ?>
		</div>
	</form>
</div>