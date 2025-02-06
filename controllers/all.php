<?php
	$articles = getArticles();   // получить список всех статей
	$notificationParams = ['registerSuccess' => false, 'addSuccess' => false,
	 'editSuccess' => false, 'deleteSuccess' => false, ];
	notificationCheck($notificationParams);




	$pageTitle = "articles list";
	$pageContent = template("articles/v_index", [    // отобразить их
		'articles' => $articles,
		'registerSuccess' => $notificationParams['registerSuccess'],
		'addSuccess' => $notificationParams['addSuccess'],
		'deleteSuccess' => $notificationParams['deleteSuccess'],
		'editSuccess' => $notificationParams['editSuccess']
	]);


?>
