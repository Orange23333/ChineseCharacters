<?php
/*
 * OurOpenSource EasyMark via php
 * Copyright Orange233 2022
 */
namespace EasyMark {
    abstract class Mark {
        abstract function getName(): string;

        abstract function ToHtml(string $arg, string $basePath): string;

        function ToMark(string $arg): MarkContent {
            return new MarkContent(getName(), $arg);
        }
    }

    class EasyMarksManager {
        private static array $marks = array();

        static function getMarks(): array {
            return self::marks;
        }

        static function Register(IMark $mark): Void {
            self::$marks = array_merge(array(
                $mark->getName() => $mark
            ), self::$marks);
        }

        static function Unregister(string $markName): Void {
            $target = self::$marks[$markName];
            unset($target);
        }

        static function RegisterPrefabs(): Void {
            self::Register(new EM_cmt());
            self::Register(new EM_img());
            self::Register(new EM_obj());
        }
    }

    class EasyMarkDocument {
        private ?MarkedMark $markedMark = null;

        function getMarkedMark(): MarkedMark {
            return $markedMark;
        }

        function LoadFromFile(string $path): Void {
            $markedMark = EasyMarkLoader . LoadFromFile($path);
        }

        function Load(MarkedMark $markedMark): Void {
            $this->markedMark = $markedMark;
        }
    }

    class EasyMarkLoader {
        static function Escape(string $origin): string {
            $r = new string($origin);

            for ($i = 0; $i < strlen($sb); $i ++) {
                if (strcmp(substr($r, $i, 1), '[') == 0) {
                    $r = substr($r, 0, $i) . '[' . substr($r, $i); // Insert($i, '[')
                    $i ++;
                } else if (strcmp(substr($r, $i, 1), ']') == 0) {
                    $r = substr($r, 0, $i) . ']' . substr($r, $i); // Insert($i, ']')
                    $i ++;
                }
            }

            return $r;
        }

        static function LoadFromFile(string $path): MarkedMark {
            // 用file_get_contents读取，只能适用于小文件。
            return ProcessMark(file_get_contents($path), dirname($path));
        }

        static function ProcessMark(string $originText, string $path): MarkedMark {
            $originText = str_replace('\r\n', '\n', $originText);

            $move = 0;
            $inMark = false;
            $marksPosition = array();
            $marksLength = array();
            $processedText = new string($originText);

            preg_match_all('[\[]{1,}|[\]]{1,}', $originText, $matches, PREG_OFFSET_CAPTURE);
            $matches = $matches[0];

            try {
                for ($i = 0; $i < count($matches); $i ++) {
                    $match = $matches[$i];
                    $moveTemp = $strlen($match[0]) / 2;
                    $realIndex = $match[1] - $move;
                    $processedText = substr($processedText, 0, $realIndex) . substr($processedText, $realIndex + $moveTemp); // Remove($realIndex, $moveTemp)
                    $move += $moveTemp;
                    if ($strlen($match[0]) % 2 != 0) {
                        if (strcmp(substr($match, 0, 1), '[') == 0) {
                            if ($inMark) {
                                throw new Exception('Repeated left bracket.');
                            } else {
                                $inMark = true;
                            }
                            $markPosition = $realIndex + ($strlen($match[0]) - 1) - $moveTemp;
                            if (strcmp(substr($processedText, $markPosition + 1, 0), ' ') != 0) {
                                throw new Exception('After left bracket of beginning of the mark should be \' \'.');
                            }
                            array_push($marksPosition, $markPosition);
                        } else if (strcmp(substr($match, 0, 1), ']') == 0) {
                            if ($inMark) {
                                array_push($marskLength, $realIndex - $marksPosition[count($marksPosition) - 1] + 1);
                                $inMark = false;
                            } else {
                                throw new Exception('Lost left bracket.');
                            }
                            if (strcmp(substr($processedText, $realIndex - 1, 0), ' ') != 0) {
                                throw new Exception('Before right bracket of ending of the mark should be \' \'.');
                            }
                        }
                    }
                }
            } catch (OutOfRangeException $ex) {
                throw new Exception('Left and right brackets do not match.');
            }

            return new MarkedMark($marksPosition, $marksLength, $processedText, $path);
        }
    }

    class MarkedMark {
        private string $basePath;

        function getBasePath(): string {
            return $basePath;
        }

        function setBasePath(string $value): Void {
            $basePath = $value;
        }

        private array $marksPosition;

        function getMarksPosition(): array {
            return $marksPosition;
        }

        function setMarksPosition(array $value): Void {
            $marksPosition = $value;
        }

        private array $marksLength;

        function getMarksLength(): array {
            return $marksLength;
        }

        function setMarksLength(array $value): Void {
            $marksLength = $value;
        }

        private string $text;

        function getText(): string {
            return $text;
        }

        function setText(string $value): Void {
            $text = $value;
        }

        function get(int $index): EasyMarkContent {
            return new MarkContent(substr($text, $marksPosition[$index], $marksLength[$index]));
        }

        function Output(): string {
            $doc = new string($text);

            for ($i = 0, $j0 = $j1 = 0, $move = 0; $i < strlen($doc); $i ++) {
                if (strcmp(substr($doc, $i, 1), '[') == 0) {
                    if ($i - $move == $marksPosition[$j0]) {
                        $j0 ++;
                    } else {
                        $i ++;
                        $doc = substr($doc, 0, $i) . '[' . substr($doc, $i); // Insert($i, '[')
                        $move ++;
                    }
                } else if (strcmp(substr($doc, $i, 1), ']') == 0) {
                    if ($i - $move == $marksPosition[$j1] + $marksLength[$j1] - 1) {
                        $j1 ++;
                    } else {
                        $i ++;
                        $doc = substr($doc, 0, $i) . ']' . substr($doc, $i); // Insert($i, ']')
                        $move ++;
                    }
                }
            }

            return $doc;
        }

        function __construct(array $marksPosition, array $marksLength, string $text, string $basePath) {
            $this->marksPosition = $marksPosition;
            $this->marksLength = $marksLength;
            $this->text = $text;
            $this->basePath = $basePath;
        }
    }

    class MarkContent {
        private string $name;

        function getName(): string {
            return $name;
        }

        function setName(string $value): Void {
            if (is_null($value)) {
                throw new Exception('Value is null.');
            }
            $name = $value;
        }

        private string $arg;

        function getArg(): string {
            return $arg;
        }

        function setArg(string $value): Void {
            $arg = is_null($value) ? '' : $value;
        }

        function toString(): string {
            return $name . ($arg == '' ? '' : ' ' . $arg);
        }

        function toStringWithBrackets(): string {
            return '[ ' . $this->toString() . ' ]';
        }

        function __construct(string $name, string $arg = '') {
            $this->setName($name);
            $this->setArg($arg);
        }

        static function ConstructWithFullMark(string $fullMark): EasyMarkContent {
            if (preg_match('^\[ .* \]$', $fullMark) == 0) {
                throw new Exception('Not a completed mark.');
            }

            $content = substr($fullMark, 2, strlen($fullMark) - 4);

            $name_i = 0;
            for (; $name_i < strlen($content) and strcmp(substr($content, $name_i, 1), ' ') != 0; $name_i ++);
            $name = substr($content, 0, $name_i);
            $arg = '';

            if (preg_match('[^A-Za-z0-9_]', $name) != 0) {
                throw new Exception('The name of mark must only has alphabets, numbers and `\'_\'`.');
            }
            if (strlen($name) < strlen($content) - 1) {
                $arg = substr($content, strlen($name) + 1);
            }

            return new MarkContent($name, $arg);
        }
    }
}
?>