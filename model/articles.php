<?php
	include_once('core/db.php');

	function getArticles(){
		$sql = "SELECT * FROM articles ORDER BY dt_add DESC";
		$query = dbQuery($sql);
		$articles = $query->fetchAll();
		return $articles;
	}

	function addArticle(string $title, string $content, int $id_user){
		$params = ['title' => $title, 'content' => $content, 'id_user' => $id_user];
		$sql = "INSERT articles (id_user, title, content) VALUES (:id_user, :title, :content)";
		dbQuery($sql, $params);
	}

	function removeArticle(int $id){
		$sql = "DELETE FROM articles WHERE `articles`.`id_article` = '$id'";
		dbQuery($sql);
	}

	function saveArticle(int $id, string $newContent){
		$sql = "UPDATE `articles` SET `content` = '$newContent' WHERE `articles`.`id_article` = '$id'";
		dbQuery($sql);
	}

	function validateArticle(&$fields)
	{
		$errors = [];
		if($fields['title'] === '' || $fields['content'] === ''){
			$errors [] = 'Заполните все поля!';
		}
		if(mb_strlen($fields['title'], 'UTF-8') < 4)
		{
			$errors [] = 'Заголовок не короче 4 символов';
		}
		$fields['title'] = htmlspecialchars($fields['title']);
		$fields['content'] = htmlspecialchars($fields['content']);
		return $errors;
	}

	function notificationCheck(&$notificationParams)
	{
		if(isset($_SESSION['register']))
		{
			$notificationParams['registerSuccess'] = true;
			unset($_SESSION['register']);
		}

		if(isset($_SESSION['add']))
		{
			$notificationParams['addSuccess'] = true;
			unset($_SESSION['add']);
		}

		if(isset($_SESSION['delete']))
		{
			$notificationParams['deleteSuccess'] = true;
			unset($_SESSION['delete']);
		}

		if(isset($_SESSION['edit']))
		{
			$notificationParams['editSuccess'] = true;
			unset($_SESSION['edit']);
		}
		return true;
	}
