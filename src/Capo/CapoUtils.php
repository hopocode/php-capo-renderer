<?php

/**
 * PhpCapo
 *
 * Copyright (c) 2022 Jan Pospisil (https://honzapospisil.com)
 */

declare(strict_types=1);

namespace Hopo\PhpCopo;

class CapoUtils {

    public static function jsonStringToArray(string $str): array {
        return json_decode($str, true);
    }

    public static function validateSpec(array $arr): bool {
        return true;
    }

}