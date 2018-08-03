<?php
function fillTemplate($name, $values = array(), $unhandled = "delete")
{
	$templateFile = '/Library/WebServer/Documents/workspace/PHPWork/Template/' . $name;

	if ($file = fopen($templateFile, 'r')) {
		$template = fread($file, filesize($templateFile));
		fclose($file);
	}

	$keys = array_keys($values);

	foreach ($keys as $key) {
		// テンプレート内のキーを検索して置換する
		$template = str_replace("{{$key}}", $values[$key], $template);
	}

	if ($unhandled == 'delete') {
		// 残ったキーを削除する
		$template = preg_replace('/{[^ }]*}/i', '',$template);
	}
	elseif ($unhandled == 'comment') {
		// 残ったキーをコメントで置換する
		$template = preg_replace('/{([^ }*)}/i', '<!-- \\1 undefined -->', $template);
	}

	return $template;
}
