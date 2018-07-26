<?php
function hasRequired($array, $requiredFields)
{
	$keys = array_keys($array);

	foreach ($requiredFields as $fieldname) {
		if (!in_array($fieldname, $keys)) {
			return false;
		}
	}
	return true;
}

if ($_POST['submitted']) {
	echo "<p>全ての入力必須項目を";
	echo(hasRequired($_POST, array('name', 'email_address')) ? "入力しました。" : "入力し終えていません。</p>");
} ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<p>名前：<input type="text" name="name" /><br />
	メールアドレス：<input type="text" name="email_address" /><br />
	年齢（任意）：<input type="text" name="age" /><br />

	<p align="center"><input type="submit" value="送信" name="submitted" /></p>
</form>
