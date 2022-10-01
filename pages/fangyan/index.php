<?php
	$_dir = __DIR__ . '/../..';
	require $_dir . '/includes/fangyan/fy-ebook-proc.php';
	require $_dir . '/includes/fangyan/fy-content.php';

	$bottomInfo = nl2p(<<<EOF
版权所有 2022 全部的原作者和贡献者
Copyright (c) 2022 All Original Authors and Contributors
<a href="https://gitee.com/orange23333/chinese-characters/blob/main/LICENSE.txt">使用许可证（简体中文）</a> | <a href="https://github.com/Orange23333/ChineseCharacters/blob/main/LICENSE.en-US.txt">License (English)</a>
<a href="https://gitee.com/orange23333/chinese-characters">码云 Gitee</a> | <a href="https://github.com/Orange23333/ChineseCharacters">Github</a>
EOF, to_attr_class_name('os-bottom-info'));

	echo <<<EOF
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>方言 Fang Yan</title>
		<link rel="stylesheet" href="/css/fangyan.css">
	</head>
	<body>
EOF;
	print_fy_ebook($fy_content, 'fy-ebook');
	echo '<div class="os-bottom-info">' . $bottomInfo . '</div>';
	echo <<<EOF
	</body>
</html>
EOF;
?>
	