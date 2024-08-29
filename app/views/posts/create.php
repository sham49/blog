<form method="post" class="create_post">
	<label for="title">Заголовок</label>
	<input type="text" name="title" id="title" value="<?=old('title')?>">
	<div class="error">
		<?php if(isset($_SESSION['title'])) : ?>
			<?= $_SESSION['title'] ?>
		<?php endif; ?>
	</div>

	<label for="author">Автор</label>
	<input type="text" name="author" id="author" value="<?=old('author')?>">
	<div class="error">
		<?php if(isset($_SESSION['author'])) : ?>
			<?= $_SESSION['author'] ?>
		<?php endif; ?>
	</div>

	<label for="short_content">Краткое содержание</label>
	<input type="text" name="short_content" id="short_content" value="<?=old('short_content')?>">
	<div class="error">
		<?php if(isset($_SESSION['short_content'])) : ?>
			<?= $_SESSION['short_content'] ?>
		<?php endif; ?>
	</div>

	<label for="full_content">Полное содержание</label>
	<input type="text" name="full_content" id="full_content" value="<?=old('full_content')?>">
	<div class="error">
		<?php if(isset($_SESSION['full_content'])) : ?>
			<?= $_SESSION['full_content'] ?>
		<?php endif; ?>
	</div>

	<input type="submit">
</form>