<?php
$_dir = __DIR__ . '/../..';
require_once ($_dir . '/includes/fangyan/fy-ebook-proc.php');
require_once ($_dir . '/includes/fangyan/fy-content.php');

$bottomInfo = nl2p(<<<EOF
版权所有 2022-2023 全部的原作者和贡献者
Copyright (c) 2022-2023 All Original Authors and Contributors
<a href="https://gitee.com/orange23333/chinese-characters/blob/main/LICENSE.txt">使用许可证（简体中文）</a> | <a href="https://github.com/Orange23333/ChineseCharacters/blob/main/LICENSE.en-US.txt">License (English)</a>
<a href="https://gitee.com/orange23333/chinese-characters">码云 Gitee</a> | <a href="https://github.com/Orange23333/ChineseCharacters">GitHub</a>
EOF, to_attr_class_name('os-bottom-info'));

echo <<<EOF
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>方言 Fang Yan</title>

		<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="/css/fangyan.css">

		<script src="/js/jquery/jquery.min.js"></script>
		<script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
		<script type="text/javascript">
			const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
			const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
		</script>
	</head>
	<body>
EOF;

print_fy_ebook($fy_content, 'fy-ebook');
echo '<div class="os-bottom-info">' . $bottomInfo . '</div>';

echo <<<EOF
		<a href="# class="fy-sub-title" data-bs-toggle="tooltip" data-bs-title="Tooltip on left">Test 123</a>
	</body>
</html>
EOF;
?>
