<?php declare (strict_types = 1);
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

class Assert
{

    /**
     * Certifique-se que é uma string no formato uuid4
     *
     * @param mixed $uuid
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsUuid4($uuid, string $message) : void
    {
        if (preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $uuid) !== 1) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * Certifique-se que os argumentos são iguais e do mesmo tipo.
     *
     * @param mixed $Object1
     * @param mixed $Object2
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentsAreEqualsAndTheSameType($Object1, $Object2, string $message) : void
    {
        if ($Object1 !== $Object2) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que os argumentos são iguais.
     *
     * @param mixed $Object1
     * @param mixed $Object2
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentsAreEquals($Object1, $Object2, string $message) : void
    {
        if ($Object1 != $Object2) 
            throw new InvalidArgumentException($message);
    }

    public static function thatTheArgumentIsEqualToOneOfTheValues(
        $value, 
        array $values, 
        bool $checkType = true, 
        string $message
    ) :void {

        if (!\in_array($value, $values, $checkType))
            throw new InvalidArgumentException($message);

    }

    /**
     * Certifique-se que o argumento é falso
     *
     * @param mixed $Boolean
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsFalse($Boolean, string $message) : void
    {
        if ($Boolean) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento é verdadeiro
     *
     * @param mixed $boolean
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsTrue($boolean,string $message) : void
    {
        if (!$boolean) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento não é maior que... 
     *
     * @param mixed float|numeric|integer $value
     * @param mixed float|numeric|integer $maximum
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsNotGreaterThan($value, $maximum, string $message) : void
    {

        if (!is_int($value) && !is_float($value) && !is_numeric($value))
            throw new InvalidArgumentException('Tipo inválido para verificação');

        if ($value > $maximum) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento está entre...
     *
     * @param mixed $string
     * @param integer $minimum
     * @param integer $maximum
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsBetween($string, int $minimum, int $maximum, string $message) : void
    {
        if (is_string($string)) {
            $length = strlen(trim($string));
        } else if (!is_int($string))  {
            throw new InvalidArgumentException('Tipo inválido para verificação');
        } 
        if ($length < $minimum || $length > $maximum) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento não é vazio
     *
     * @param mixed $value
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsNotEmpty($value, string $message) : void
    {
        if (null === $value || empty($value)) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que os argumentos não são iguais
     *
     * @param mixed $Object1
     * @param mixed $Object2
     * @param boolean $checkType
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentsAreNotEquals(
        $Object1, 
        $Object2, 
        bool $checkType = false, 
        string $message
    ) : void {

        if ($checkType) {
            if ($Object1 === $Object2) 
                throw new InvalidArgumentException($message);
        } else {
            if ($Object1 == $Object2) 
                throw new InvalidArgumentException($message);
        }
        
    }

    /**
     * Certigique-se que o argumento não é nulo.
     *
     * @param string $Object
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsNotNull($Object, string $message) : void
    {
        if (null === $Object) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento está entre...
     *
     * @param mixed $string
     * @param integer $minimum
     * @param integer $maximum
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentRange($value, int $minimum, int $maximum, string $message) : void
    {
        self::thatTheArgumentIsBetween($value, $minimum, $maximum, $message);
    }

    /**
     *  Certifique-se que o comprimentoda string não é menor que...
     *
     * @param mixed $value
     * @param integer $minimum
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentLengthIsNotLessThan(
        string $string, 
        int $minimum, 
        string $message
    ) : void {

        $length = mb_strlen(trim($string));            
        if ($length < $minimum) 
            throw new InvalidArgumentException($message);

    }

    /**
     * Certifique-se que o compriment oda string não é maior que...
     *
     * @param string $string
     * @param integer $maximum
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentLengthIsNotLongerThan(
        string $string, 
        int $maximum, 
        string $message
    ) : void {

        $length = mb_strlen(trim($string));
        if ($length > $maximum) 
            throw new InvalidArgumentException($message);

    }

    /**
     * Certifique-se que o comprimento do argumento é exatamente...
     *
     * @param string $string
     * @param integer $length
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentHasTheExactLength(string $string, int $length, string $message) : void
    {
        $stringLength = mb_strlen(trim($string));
        if ((int) $stringLength !== $length) {
            throw new InvalidArgumentException($message);
        }

    }

    /**
     * Certifique-se que ao menos um dos argumentos não é nulo
     *
     * @param mixed $arg1
     * @param mixed $arg2
     * @param string $message
     * @return void
     */
    public static function thatAtLeastOneOfTheArgumentsIsNotEmpty($arg1, $arg2, string $message) : void
    {
        if (is_array($arg1) && count($arg1) <= 0) 
            $arg1 = null;

        if (is_array($arg2) && count($arg2) <= 0) 
            $arg2 = null;

        if ((empty($arg1) || null === $arg1) && (empty($arg2) || null === $arg2)) 
            throw new InvalidArgumentException($message);

    }

    /**
     * Certigique-se que é um e-mail
     *
     * @param mixed $emailAddress
     * @param string $message
     * @return void
     */
    public static function assertThatTheArgumentIsAnEmailAddress($emailAddress, string $message) : void
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certigique-se que o argumento não contenha espaços...
     *
     * @param mixed $string
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentNotContainsSpaces($string, string $message) : void
    {
        if (preg_match('/\s/', $string)) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o argumento é um endereço de IP
     *
     * @param mixed $ip
     * @param string $message
     * @return void
     */
    public static function thatTheArgumentIsAnIpAddress($ip, string $message) : void 
    {
        if (preg_match(
            '/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/',
            $ip
            )
        ) {
            throw new InvalidArgumentException($message);
        }
    }

    /**
     * Certifique-se que o arquivo existe
     *
     * @param [type] $file
     * @param string $message
     * @return void
     */
    public static function thatTheFileExists($file,string $message) : void
    {
        if (!file_exists($file)) 
            throw new InvalidArgumentException($message);
    }

    /**
     * Certifique-se que o arquivo é legível 
     *
     * @param mixed $file
     * @param string $message
     * @return void
     */
    public static function thatTheFileIsReadable($file, string $message) : void
    {
        if (!is_readable($file)) 
            throw new InvalidArgumentException($message);

    }


}
