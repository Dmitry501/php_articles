<?php
if($user === null)
{
	header('Location: ' . BASE_URL.'login');
	exit();
}
	$checkId = false;
	$articles = getArticles();
	$id = URL_PARAMS['id'];
	foreach ($articles as $article) {
		if ($article['id_article'] == $id) {
			$checkId = true;
			removeArticle($id);
			$_SESSION['delete'] = true;
		}
	}
	if($checkId)
	{
		header('Location: ' . BASE_URL);
		exit();
	}
	else {
		header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404"); // отобразить
    exit;
	}
?>
