<!DOCTYPE html>
<html lang="en">
<head>
<link rel="cannonical" href="<?=$urlCanonical?>">
<link rel="stylesheet" href="<?=BASE_URL?>assets/css/main.css">
<title><?=$title?></title>
</head>

<body>

<header>
  <h1 align="center">Наш всратый сайт со списком статей</h1>
  <nav class="link_list" align="center">
    <a class="link_list-item" href="<?=BASE_URL?>">Home</a>
    <a class="link_list-item" href="<?=BASE_URL?>add">Add article</a>
  </nav>

  <nav class="authorization" align="right">
  <? if($user === null): ?>
  <a class="authorization-item" href="<?=BASE_URL?>login">Login</a>
  <a class="authorization-item" href="<?=BASE_URL?>register">Register</a>
  <? else: ?>
  <a class="authorization-item" href="<?=BASE_URL?>logout">Log out, <?=$user['login']?></a>
  <?php endif; ?>
  </nav>
</header>

<div class="site-content">
  <div class="container">
    <?=$content?>
  </div>
</div>

<footer align="center">
  <p>Спасибо что долистали до конца, это футер</p>
</footer>

</body>
