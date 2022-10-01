<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>方言 Fang Yan</title>
		<link rel="stylesheet" href="/css/fangyan.css">
	</head>
	<body>
		<?php
			function nl2p(string $text, string $attributes): string{
				if (is_null($text)) {
					return "<p/>";
				}
				
				$r = "<p " . $attributes .">";
				for ($i = 0; $i < strlen($text); $i++) {
					$_char = substr($text, $i, 1);
					if (strcmp($_char,"\n") == 0) {
						$r = $r . "</p><p " . $attributes .">";
						if ($i + 1 < strlen($text)) {
							$_char = substr($text, $i + 1, 1);
							if (strcmp($_char,"\r") == 0) {
								$i++;
							}
						}
					} else if (strcmp($_char,"\r") == 0) {
						$r = $r . "</p><p " . $attributes .">";
						if ($i + 1 < strlen($text)) {
							$_char = substr($text, $i + 1, 1);
							if (strcmp($_char,"\n") == 0) {
								$i++;
							}
						}
					} else {
						// 可以等索引值攒了一部分后再一次写入。
						$r = $r . $_char;
					}
				}
				$r = $r . "</p>";

				return $r;
			}

			$title = "輶轩使者绝代语释别国方言";
			$bookInfo = "[汉] 杨雄 撰 | [晋] 郭璞 注";
			$text = nl2p(<<<EOF
第一行
第二行
EOF, "class=\"fy-text-p\"");
			$bottomInfo = nl2p(<<<EOF
版权所有 2022 全部的原作者和贡献者
Copyright (c) 2022 All Original Authors and Contributors
<a href="https://gitee.com/orange23333/chinese-characters/blob/main/LICENSE.txt">使用许可证（简体中文）</a> | <a href="https://github.com/Orange23333/ChineseCharacters/blob/main/LICENSE.en-US.txt">License (English)</a>
<a href="https://gitee.com/orange23333/chinese-characters">码云 Gitee</a> | <a href="https://github.com/Orange23333/ChineseCharacters">Github</a>
EOF, "class=\"os-bottom-info-p\"");

			echo "<h1 class=\"fy-title\">$title</h1>";
			echo "<div class=\"fy-book-info\">$bookInfo</div>";
			echo "<div class=\"fy-text\">$text</div>";
			echo "<div class=\"os-bottom-info\">$bottomInfo</div>";
		?>
	</body>
</html>