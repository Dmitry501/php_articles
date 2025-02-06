<div class="content">
		<div class="article">
			<h1><?=$post['title']?></h1>
			<div><?=$post['content']?></div>
			<hr>
			<div>Writen by: <?=$author['login']?></div>
			<? if(isset($user)): ?>
			<? if($user['id_user'] == $author['id_user'] || $user['id_user'] == 1): ?>
			<hr>
			 <a href="<?=BASE_URL?>delete/<?=$id?>">Remove</a>
			 <hr>
			 <a href="<?=BASE_URL?>edit/<?php echo $id;?>">Edit</a>
			<?php endif; ?>
			<?php endif; ?>
			</div>
</div>
<hr>
<a href="<?=BASE_URL?>">Move to main page</a>
