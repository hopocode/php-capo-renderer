<?php

declare(strict_types=1);

use Hopo\PhpCopo\CapoRender;
use Tester\Assert;

require __DIR__ . '/../boot.php';

// $spec = CapoRender::specFileToHtmlString("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/hello-world.json");
// $html = file_get_contents("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/hello-world.html");
// Assert::same($html, $spec);

// $spec = CapoRender::specFileToHtmlString("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/html-escape.json");
// $html = file_get_contents("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/html-escape.html");
// Assert::same($html, $spec);

$spec = CapoRender::specFileToHtmlString("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/simple-menu.json");
$html = file_get_contents("https://raw.githubusercontent.com/hopocode/component-renderer-out/main/src/simple-menu.html");
function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);
    $b = strtr($buffer, ["> <" => "><"]);
    return $b;
}



$htmlNoSpace = sanitize_output($html);
Assert::same($htmlNoSpace, $spec);



