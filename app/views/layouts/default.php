<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
	<div class="<?=$_SESSION['color']?>">
		<?php get_alerts(); ?>
	</div>
	<div class="wrapper">
		<header>
			<nav>
				<div class="nav">
					<a href="/">Home</a>
					<a href="/posts/create/">Add Message</a>
				</div>
			</nav>	
		</header>
		<main class="main">
			<?=$content?>
		</main>
		<footer>
			<p>&copy; Copyright <?=date('Y')?></p>
		</footer>
	</div>
	
	
</body>
</html>