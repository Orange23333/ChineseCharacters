<?php
$fy_title = '輶轩使者绝代语释别国方言';
$fy_author = '[汉] 杨雄 撰 | [晋] 郭璞 注';
$fy_publication_instructions_title = '出版说明';
$fy_publication_instructions = <<<EOF
我国传统的语言文字学又称小学，为治经明史之基础，其发展源远流长，经历了先秦的萌芽时期，到汉代出现了重要的语言学著作《尔雅》《方言》《说文解字》和《释名》。作为传统语言学的奠基之作，这四部典籍为历代治学者所重视，为中华文化的传承作出了重要贡献。当下传统文化深受重视，许多读者由文而史，而经，进而对上述四种小学典籍产生了很大兴趣，却苦于找不到一种既有一定权威性，又便于使用的本子。有鉴于此，我们不以所谓善本、孤本为追求目标，而选取四种经典版本加以影印，施以圈点句读、标示字头、编制索引，为学界提供方便精善的读本。
《方言》，原名《輶轩使者绝代语释别国方言》，旧题西汉扬雄撰，是我国第一部汉语方言比较词汇集。东晋郭璞为《方言》作注，不仅校字注音、疏证词义、阐明体例，更以晋时方言来与杨雄所记录的汉时相比较，从而揭示了三百年间汉语方言的历时变化，也呈现了晋代方言的一些实际面貌。
《方言》宋代曾有国子监本、
EOF;
$fy_menu_title = '目录';
$fy_menu = <<<EOF
<a href="#FangYan_Preface">方言序</a>
EOF;
$fy_preface_title = '<a id="FangYan_Preface">方言序</a>';
$fy_preface_author = "郭璞";
$fy_preface = <<<EOF
<i>（标点是自行修改的，不一定正确。用简体只是为了方便，可能繁体更接近原有意思，标有*号（*号左侧的）字是找不到字符的替代，不一定正确）</i>
盖闻方言之作，出乎輶轩之使。所以巡游万国，采览异言。车轨之所交，人际之所蹈。靡不毕载，以为奏籍。周秦之季，其业隳废，莫有存者，曁乎扬生，沉淡其志，历载构缀，乃就斯文。是以三五之篇著，而独鉴之功显。故可不出户庭而坐照四表，不劳畴咨而物来能名。考九服之逸言，摽六代之绝语。类离词之指韵*（……）
EOF;

// array(array(string $htmlLabelClassName, string $text))
$fy_content = array(
    array('fy-title', $fy_title),
    array('fy-book-info', $fy_author),
	array('fy-sub-title', $fy_publication_instructions_title),
	array('fy-text', $fy_publication_instructions),
	array('fy-sub-title', $fy_menu_title),
	array('fy-text', $fy_menu),
    array('fy-sub-title', $fy_preface_title),
    array('fy-book-info', $fy_preface_author),
    array('fy-text', $fy_preface)
);
?>