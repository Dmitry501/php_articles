<?php

	$articles = getArticles();
	$id = (int)(URL_PARAMS['id']);
	$post = [];

	foreach ($articles as $article) {
		if($article['id_article'] == $id)
		{
				$post = $article;
				$author = getUserById($post['id_user']);
		}
	}

	if($post)
	{
		$pageTitle = "One article";
		$pageContent = template("articles/v_article", [
			'post' => $post,
			'id' => $id,
			'author' => $author,
			'user' => $user
		]);
	}
	else {
		header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404"); // отобразить
    exit;
	}
?>
