<?php
if($user === null)
{
	header('Location: ' . BASE_URL.'login');
	exit();
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$fields = extractField($_POST, ['title', 'content']);

		$validateErrors = validateArticle($fields);

		if(empty($validateErrors))
		{
			addArticle($fields['title'], $fields['content'], $user['id_user']);
			$_SESSION['add'] = true;
			header('Location: ' . BASE_URL);
			exit();
		}
	}
	else {
		$validateErrors = [];
	  $fields = ['title' => '', 'content' => ''];
	}
	$pageTitle = "Add";
	$pageContent = template('articles/v_add',[
		'fields' => $fields,
		'validateErrors' => $validateErrors
	]);
?>
