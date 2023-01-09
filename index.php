<?php
header('Location: /pages/fangyan/index.php');
$url = '/pages/fangyan/index.php';
echo <<<EOF
<!DOCTYPE HTML>
<html>
	<head>

EOF;
echo '<meta http-equiv="refresh" content ="10;url=' . $url . '"/>';
echo <<<EOF

	</head>
	<body>
		<p>Jump to <a href="$url">$url</a>.</p>
	</body>
</html>
EOF;
exit();
?>