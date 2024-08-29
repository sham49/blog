<?php

namespace app\models;

use core\Model;

class Posts extends Model{

	public function create(){
		session_unset();
		if($_SERVER['REQUEST_METHOD'] === 'POST'){

			validation('title', 'Заголовок');
			validation('author', 'Автор');
			validation('short_content', 'Краткое содержание');
			validation('full_content', 'Полное содержание');

			if(empty($_SESSION)){
				if($this->db->query("INSERT INTO posts(`title`, `author`, `short_content`, `full_content`) VALUES(?, ?, ?, ?)", [$_POST['title'], $_POST['author'], $_POST['short_content'], $_POST['full_content']])){
					$_SESSION['success'] = 'Сообщение добавлено';
					$_SESSION['color'] = 'success';
				}
				redirect('/');
			}

		}
	}

	public function full(){
		$params = [
			'id' => $_GET['id'],
		];

		$result = $this->db->query("SELECT * FROM posts WHERE id = :id", $params)->fetchAll();
		return $result;
	}

	public function delete(){
		$params = [
			'id' => $_POST['id']
		];
		if($this->db->query("DELETE posts, comments FROM posts
							 JOIN comments
							 ON posts.id = comments.post_id
							 WHERE id = :id OR post_id = :id", $params)){
			$_SESSION['delete'] = 'Сообщение удалено';
			$_SESSION['color'] = 'delete';
		}
	}

	public function getValues(){
		$params = [
			'id' => $_POST['id']
		];

		$result = $this->db->query("SELECT * FROM posts WHERE id = :id", $params)->fetchAll();
		return $result;
	}

	public function edit(){
		$params = [
			'id' => $_POST['id'],
			'title' => $_POST['title'],
			'author' => $_POST['author'],
			'short_content' => $_POST['short_content'],
			'full_content' => $_POST['full_content']
		];

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if($this->db->query("UPDATE posts SET title = :title, author = :author, short_content = :short_content, full_content = :full_content WHERE id = :id", $params)){
				$_SESSION['update'] = 'Сообщение изменено';
				$_SESSION['color'] = 'update';
				redirect('/posts/full/?id=' . $_POST['id']);
			}
		}
	}

	public function showComments(){
		$params = [
			'id' => $_GET['id'],
		];

		$result = $this->db->query("SELECT content
									FROM posts
									JOIN comments
									ON posts.id = comments.post_id
									WHERE id = :id
									GROUP BY comment_id",
									$params)->fetchAll();
		return $result;
	}

	public function addComment(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(empty($_POST['content'])){
				$_SESSION['content'] = "Комментарий не может быть пустым";
			}else{
				unset($_SESSION['content']);
			}

			if(empty($_SESSION)){
				if($this->db->query("INSERT INTO comments (`post_id`, `content`) VALUES(?, ?)", [$_POST['post_id'], $_POST['content']])){
					redirect($_SERVER['REQUEST_URI']);
				}
			}
		}
	}
}