<form method="post">
	Title:<br>
	<input type="text" name="title" value="<?=$fields['title']?>"><br>
	Content:<br>
	<input type="text" name="content" value="<?=$fields['content']?>"><br>
	<button>Send</button>
  <div class="error-list">
    <? foreach ($validateErrors as $error): ?>
        <p><?=$error?></p>
      <? endforeach; ?>
    </div>
<hr>
<a href="<?=BASE_URL?>">Move to main page
