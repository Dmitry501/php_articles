<form method="post">
 <input type="text" name="content" value="<?=$fields['content']?>"><br>
 <button>Send</button>
 <div class="error-list">
   <? foreach ($validateErrors as $error): ?>
       <p><?=$error?></p>
     <? endforeach; ?>
   </div>
