<?php

/**
 * PhpCapo
 *
 * Copyright (c) 2022 Jan Pospisil (https://honzapospisil.com)
 */

declare(strict_types=1);

namespace Hopo\PhpCopo;

use Exception;
use Nette\Utils\Html;

include_once (__DIR__."/CapoUtils.php");

class CapoRender{
    
    public static function specFileToHtmlString(string $filename): string {
        $content = file_get_contents($filename);
        $data = CapoUtils::jsonStringToArray($content);
        return self::specDataToHtmlString($data);
    }

    public static function specDataToHtmlString(array $spec): string {
        CapoUtils::validateSpec($spec);
        $el = Html::el($spec['el']);
        self::addAttrsToHtml($el, $spec['attrs'] ?? []);
        if(isset($spec['children'])) {
            if(!is_array($spec['children'])){
                dump($spec['children']);
            }
            self::addChildrenToHtmlEl($el, $spec['children']);
        } else {
            dump($el);
        }
        return (string) $el;
    }


    public static function addAttrsToHtml(Html $el, $attrs) {
        if($attrs) {
           if(!is_array($attrs)) {
                throw new Exception("Err 46cd4g56df4gdf46");
           }
           foreach($attrs as $k => $v) {
              if(!is_string($v)) {
                throw new Exception("Err 4fsghfh56h56h4");
              }
              $el->setAttribute($k, $v);
           }
        }
    }

    public static function addChildrenToHtmlEl(Html $el, array $children): void {
        foreach($children as $child) {
            if(isset($child['content'])) {
                if(!isset($child['escape']) || $child['escape'] === "escape_html") {
                    $el->addText(($child['content']));
                } else {
                    if($child['escape'] === "noescape") {
                        $el->addText($child['content']);
                    } else {
                        throw new Exception("Err dfgdfgdfgfdg4");
                    }
                }
            } elseif(isset($child['el'])) {
                $newEl = Html::el($child['el']);
                self::addAttrsToHtml($newEl, $child['attrs'] ?? []);
                if(isset($child['children'])) {
                    if(!is_array($child['children'])){
                        dump($child['children']);
                    }
                    self::addChildrenToHtmlEl($newEl, $child['children']);
                }
                $el->addHtml($newEl);
            } else {
                throw new Exception("Err xdsxggdsfgdsgs");
            }
        }
    }
}






// public static function specToHtmlString(array $data): string {
//     CapoUtils::validateSpec($data);
    
    


//     $html = self::addToHtmlElement($el)




//     $el = Html::el($data['el']);
//     if(isset($data['attrs'])) {
//         if(!is_array($data['attrs'])) {
//             throw new Exception("Err 46cd4g56df4gdf46");
//         }
//         foreach($data['attrs'] as $k => $v) {
//             if(!is_string($v)) {
//                 throw new Exception("Err dfgh46dfgh46");
//             }
//             $el->setAttribute($k, $v);
//         }
//     }
//     if(is_string($data['children'])) {
//         $el->setText($data['children']);
//     } elseif(is_array($data['children'])) {
//         foreach($data['children'] as $child) {

//         }
//     }

//     return (string) $el;
// }

// public static function addToHtmlElement(Html $el, $children){
//     if(is_string($))

// }
