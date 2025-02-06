<form method="post">
	Login:<br>
	<input type="text" name="login"><br>
	Password:<br>
	<input type="password" name="password"><br>
  <input type="checkbox" name="remember">
  Запомнить меня?<br><br>
	<button>Send</button>
  <div class="error-list">
    <? foreach ($errors as $error): ?>
        <p><?=$error?></p>
      <? endforeach; ?>
    </div>
<hr>
<a href="<?=BASE_URL?>">Move to main page
