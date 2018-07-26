<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$mediatype = isset($_POST['mediatype']) ? $_POST['mediatype'] : '';
$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
$caption = isset($_POST['caption']) ? $_POST['caption'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

$tried = isset($_POST['tried']) && $_POST['tried'] == 'yes' ? True : False;

if($tried){
	$validate = (!empty($name) && !empty($mediatype) && !empty($filename)) ? True : False;

	if(!$validate){ ?>
		<p>名前、メディア形式、ファイル名は必須入力項目です。<br />
		値を入力して下さい。</p>
<?php
		echo "\$tried ：" . ($tried ? "true" : "false") . "<br />";
		echo "\$validate ：" . ($validate ? 'true' : 'false') . "<br />";
		echo "\$name ：{$name} <br />";
		echo "\$mediatype ：{$mediatype} <br />";
		echo "\$filename ：{$filename} <br />";
		echo "\$caption ：{$caption} <br />";
		echo "\$status ：{$status} <br />";
		echo "<br />";

?>
<?php }
	else{
		echo "<p>データが作成されました。</p>";
	}
}

function mediaSelected($type)
{
	global $mediatype;

	if($mediatype == $type){
		echo "selected";
	}
} ?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		名前：<input type="text" name="name" value="<?= $name; ?>" /><br />

		状態：<input type="checkbox" name="status" value="active"
		<?php if($status == "active"){
			echo "checked";
		} ?> />公開<br />
		メディア形式：<select name="mediatype">
			<option value="">選択して下さい</option>
			<option value="picture" <?php mediaSelected("picture"); ?> >静止画</option>
			<option value="audio" <?php mediaSelected("audio"); ?> >音声</option>
			<option value="movie" <?php mediaSelected("movie"); ?> >動画</option>
		</select><br />
		ファイル名：<input type="text" name="filename" value="<?= $filename; ?>" /><br />
		見出し：<textarea name="caption"><?= $caption ?></textarea><br />

		<input type="hidden" name="tried" value="yes" />
		<input type="submit" value="<?php echo $tried ? "続行" : "作成"; ?>" />
</form>

