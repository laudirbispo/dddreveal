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


use InvalidArgumentException;

trait AssertionValidationTrait
{
    protected function assertValidUuid4($uuid, $message) 
    {
        if (preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $uuid) !== 1) {
            throw new InvalidArgumentException($message);
        }
    }
    
    protected function assertArgumentEquals($Object1, $Object2, $message)
    {
        if ($Object1 != $Object2) 
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentFalse($Boolean, $message)
    {
        if ($Boolean) 
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentGreaterThan($string, int $maximum, $message)
    {
        $length = strlen(trim($string));

        if ($length > $maximum)
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentBetween($string, $minimum, $maximum, $message)
    {
        $length = strlen(trim($string));

        if ($length < $minimum || $length > $maximum) 
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentNotEmpty($value, $message)
    {
        if (null === $value || empty($value)) 
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentNotEquals($Object1, $Object2, $message)
    {
        if ($Object1 == $Object2)
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentNotNull($Object, $message)
    {
        if (null === $Object)
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentRange($value, $minimum, $maximum, $message)
    {
        if ($value < $minimum || $value > $maximum)
            throw new InvalidArgumentException($message);
    }

    protected function assertArgumentTrue($boolean, $message)
    {
        if (!$boolean)
            throw new InvalidArgumentException($message);
    }

    protected function assertStateFalse($boolean, $message)
    {
        $this->assertArgumentFalse($boolean, $message);
    }

    protected function assertStateTrue($boolean, $message)
    {
        $this->assertArgumentTrue($boolean, $message);
    }

    protected function assertThatTheArgumentLengthIsLessThan($string, int $minimum, $message)
    {
        $length = mb_strlen(trim($string));
        if ($length < $minimum)
            throw new InvalidArgumentException($message);
    }
    
    protected function assertThatTheArgumentLengthIsLongerThan($string, int $maximum, $message)
    {
        $length = mb_strlen(trim($string));
        if ($length > $maximum)
            throw new InvalidArgumentException($message);
    }
    
    protected function assertThatTheArgumentHasTheExactLength($string, int $length, $message) 
    {
        $stringLength = count(trim($string));
        if ($stringLength !== $length)
            throw new InvalidArgumentException($message);
    }
    
    protected function assertThatAtLeastOneOfTheArgumentsIsNotEmpty($arg1, $arg2, $message) 
    {
        if (is_array($arg1) && count($arg1) <= 0) 
            $arg1 = null;
        if (is_array($arg2) && count($arg2) <= 0) 
            $arg2 = null;
        
        if ((empty($arg1) || null === $arg1) && (empty($arg2) || null === $arg2)) 
            throw new InvalidArgumentException($message);
    }

    protected function assertThatTheArgumentIsAnEmailAddress($emailAddress, $message)
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL))
            throw new InvalidArgumentException($message);
    }
    
    protected function assertNotSpace($string, $message)
	{
		if(preg_match('/\s/', $string))
			throw new InvalidArgumentException($message);
    }
    
    protected function assertThatTheIpAddressIsValid($ip, $message) 
    {
        if(preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', $ip)) 
            throw new InvalidArgumentException($message);
        
    }

    protected function assertThatFileExists($file, $message) 
    {
        if (!file_exists($file)) 
            throw new InvalidArgumentException($message);
    }

    protected function assertThatFileIsReadable($file, $message) 
    {
        if (!is_readable($file)) 
            throw new InvalidArgumentException($message);
    }
    
}
