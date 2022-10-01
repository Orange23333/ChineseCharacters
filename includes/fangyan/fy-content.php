<?php
	$fy_title = '輶轩使者绝代语释别国方言';
	$fy_author = '[汉] 杨雄 撰 | [晋] 郭璞 注';
	$fy_preface_title = '方言序';
	$fy_preface_author = "郭璞";
	$fy_preface = <<<EOF
（标点是自行修改的，不一定正确。用简体只是为了方便，可能繁体更接近原有意思）盖闻方言之作，出乎輶轩之使。所以巡游万国，采览异言。车轨之所交，人际之所蹈。靡不毕载，以为奏籍。周秦之季，其业隳废，莫有存者，曁乎扬生，沉淡其志，历载构缀，乃就斯文。是以三五之篇著，而独鉴之功显。故可不出户庭而坐照四表，不劳畴咨而物来能名。考九服之逸言，摽六代之绝语。
EOF;

	$fy_content = array(
		array('fy-title', $fy_title),
		array('fy-book-info', $fy_author),
		array('fy-sub-title', $fy_preface_title),
		array('fy-book-info', $fy_preface_author),
		array('fy-text', $fy_preface)
	);
?>