<?php declare(strict_types=1);
namespace laudirbispo\DDDReveal\Validators;

/**
 * Copyright (c) Laudir Bispo  (laudirbispo@outlook.com)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     (c) Laudir Bispo  (laudirbispo@outlook.com)
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 *
 * @package laudirbispo\DDDReveal - This file is part of the Uploader package. 
 */


class UuidValidator 
{
    
    const UUID_VALID = '~^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$~i';
    const UUID_NIL   = '~^[0]{8}-[0]{4}-[0]{4}-[0]{4}-[0]{12}$~i';
    const UUID1      = '~^[0-9a-f]{8}-[0-9a-f]{4}-1[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$~i';
    const UUID2      = '~^[0-9a-f]{8}-[0-9a-f]{4}-2[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$~i';
    const UUID3      = '~^[0-9a-f]{8}-[0-9a-f]{4}-3[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$~i';
    const UUID4      = '~^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$~i';
    const UUID5      = '~^[0-9a-f]{8}-[0-9a-f]{4}-5[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$~i';

    public static function checkAllVersions($uuid) 
    {
        if (!self::validateUuid($uuid) &&
            !self::validateUuid1($uuid) &&
            !self::validateUuid2($uuid) &&
            !self::validateUuid3($uuid) && 
            !self::validateUuid4($uuid) &&
            !self::validateUuid5($uuid) 
        ) {
            return false;
        } else {
            return true;
        }
    }

    public static function validateUuid($uuid) : bool 
    {
        return (preg_match(self::UUID_VALID, $uuid) === 1) ? true : false;
    }

    public static function validateUuid1($uuid) : bool 
    {
        return (preg_match(self::UUID1, $uuid) === 1) ? true : false;
    }

    public static function validateUuid2($uuid) : bool 
    {
        return (preg_match(self::UUID2, $uuid) === 1) ? true : false;
    }

    public static function validateUuid3($uuid) : bool 
    {
        return (preg_match(self::UUID3, $uuid) === 1) ? true : false;
    }

    public static function validateUuid4($uuid) : bool 
    {
        return (preg_match(self::UUID4, $uuid) === 1) ? true : false;
    }

    public static function validateUuid5($uuid) : bool 
    {
        return (preg_match(self::UUID5, $uuid) === 1) ? true : false;
    }
    
}

