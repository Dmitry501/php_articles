<?php
if($user === null)
{
	header('Location: ' . BASE_URL.'login');
	exit();
}
$articles = getArticles();
$id = URL_PARAMS['id'];
$fields = [];
$validateErrors = [];
foreach ($articles as $article) {
  if($article['id_article'] == $id)
  {
    $fields = extractField($article, ['title', 'content']);
  }
}
  if($fields == null)
  {
    header('HTTP/1.1 404 Not Found');
    $pageContent = template("errors/v_404"); // отобразить
    exit;
  }

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $fields['content'] = $_POST['content'];
  $validateErrors = validateArticle($fields);
  if(empty($validateErrors))
  {
  $newContent = $_POST['content'];
  saveArticle($id, $newContent);
  $_SESSION['edit'] = true;
  header('Location: ' . BASE_URL);
  exit();
}
}

  $pageTitle = "Edit";
  $pageContent = template("articles/v_edit", [    // отобразить их
    'fields' => $fields,
    'validateErrors' => $validateErrors
  ]);
 ?>
