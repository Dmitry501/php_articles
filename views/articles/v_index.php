<? if($registerSuccess): ?>
 <p>Регистрация прошла успешно!</p>
<?php endif; ?>
<? if($addSuccess): ?>
 <p>Статья добавлена успешно!</p>
<?php endif; ?>
<? if($deleteSuccess): ?>
 <p>Статья удалена успешно!</p>
<?php endif; ?>
<? if($editSuccess): ?>
 <p>Статья отредактирована успешно!</p>
<?php endif; ?>
<h1>Articles:</h1>
<div class="articles">
	<? foreach($articles as $id => $article): ?>
		<div class="article">
			<h2><?=$article['title']?></h2>
			<a href="<?=BASE_URL?>article/<?=$article['id_article']?>">Read more</a>
		</div>
	<? endforeach; ?>
</div>
