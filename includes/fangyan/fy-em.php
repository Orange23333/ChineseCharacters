<?php
/*
 * Fang Yan's Easy-mark definitions.
 * Copyright Orange233 2023
 */
namespace FangYan {
    require_once ($_dir . '/includes/oos/easymark.php');

    // !!!!! italic bold link color

    // comment
    class FYEM_cmt extends EasyMark\Mark {
        function getName(): string {
            return 'cmt';
        }

        function ToHtml(string $arg, string $basePath): string {
            return '';
        }
    }

    // image
    class FYEM_img extends EasyMark\Mark {
        function getName(): string {
            return 'img';
        }

        function ToHtml(string $arg, string $basePath): string {
            $path = new string($arg);
            return '<img class="easymark-img" src="' . $path . '"/>';
        }
    }

	class FYEM_HTMLLabelBase extends Mark {
		var $em_name;
		var $label_name;
		var $attributes;

		function __construct(string $em_name, string $label_name, string $attributes) {
			$this->em_name = $em_name;
			$this->label_name = $label_name;
			$this->attributes = $attributes;
		}

		function getName(): string {
			return $this->em_name;
		}

		function ToHtml(string $arg, string $base): string {
		}
	}

	// object
	class FYEM_obj extends EasyMark\Mark {
		function getName(): string {
			return 'obj';
		}

		function ToHtml(string $arg, string $basePath): string {
			return '';
		}
	}

	class FYEM {
		static function getFangYanEasyMarkPrefabs(): array {
			return array(
				FYEM_cmt(),
				FYEM_img(),
				FYEM_obj()
			);
		}
	}
}
?>