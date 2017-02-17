<?php
session_start();
$token = $_POST['token'];
$comment_id = $_GET['comment_id'];
?>
<form action='update_create.php' method="post">
<input type="hidden" name="comment_id" value="<?php echo $comment_id;?>">
<input type="hidden" name="token" value="<?php echo $token;?>">
<textarea name='new_content' rows="4" cols="40"></textarea>
<p><input type="submit" value="edit"></p>
</form>

<form action='delete.php' method="post">
<input type="hidden" name="comment_id" value="<?php echo $comment_id;?>">
<input type="hidden" name="token" value="<?php echo $token;?>">
<p><input type="submit" value="delete"></p>
</form>

