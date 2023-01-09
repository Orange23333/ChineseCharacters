<?php
//require_once ($_dir . '/includes/oos/easymark.php');
//require_once ($_dir . '/includes/oos/easymark-prefabs.php');

function to_attr_class_name(string $className): string {
    return is_null($className) ? '' : 'class="' . $className . '"';
}

function nl2p(string $text, string $attributes): string {
    if (is_null($text)) {
        return '<p/>';
    }

    $r = '<p ' . $attributes . '>';
    for ($i = 0; $i < strlen($text); $i ++) {
        $_char = substr($text, $i, 1);
        if (strcmp($_char, "\n") == 0) {
            $r = $r . '</p><p ' . $attributes . '>';
            if ($i + 1 < strlen($text)) {
                $_char = substr($text, $i + 1, 1);
                if (strcmp($_char, "\r") == 0) {
                    $i ++;
                }
            }
        } else if (strcmp($_char, "\r") == 0) {
            $r = $r . '</p><p ' . $attributes . '>';
            if ($i + 1 < strlen($text)) {
                $_char = substr($text, $i + 1, 1);
                if (strcmp($_char, "\n") == 0) {
                    $i ++;
                }
            }
        } else {
            // 可以等索引值攒了一部分后再一次写入。
            $r = $r . $_char;
        }
    }
    $r = $r . '</p>';

    return $r;
}

function print_fy_ebook(array $ebook, string $className): void {
    echo '<div ' . to_attr_class_name($className) . '>';
    foreach ($ebook as $part) {
        echo '<div ' . to_attr_class_name($part[0]) . '>';

		$part_content = nl2p($part[1], to_attr_class_name($part[0]));

        echo $part_content;
        echo '</div>';
    }
    echo '</div>';
}
?>