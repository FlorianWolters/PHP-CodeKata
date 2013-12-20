<?php
namespace FlorianWolters\CodeKata;

use \InvalidArgumentException;

/**
 * The code kate {@see PrimeFactors}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 * @since     Class available since Release 0.1.0
 * @link      http://butunclebob.com/ArticleS.UncleBob.ThePrimeFactorsKata
 */
final class PrimeFactors
{
    /**
     * Returns the prime factors for the specified number.
     *
     * @param integer $n The number whose prime factors to return.
     *
     * @return array The prime factors for the specified number.
     *
     * @throws InvalidArgumentException If the specified argument is not an
     *                                  integer.
     * @throws InvalidArgumentException If the specified argument is not a
     *                                  positive number (`+1` to
     *                                  `\PHP_INT_MAX`).
     */
    public static function generate($n)
    {
        self::throwInvalidArgumentExceptionIfArgumentIsNotInteger($n);
        self::throwInvalidArgumentExceptionIfArgumentIsNotPositiveNumber($n);

        $result = [];
        $candidate = 2;

        while ($n > 1) {
            while (0 == $n % $candidate) {
                $result[] = $candidate;
                $n /= $candidate;
            }

            ++$candidate;
        }

        return $result;
    }

    /**
     * Throws an {@see InvalidArgumentException} if the specified value is not
     * an integer.
     *
     * @param mixed $value The value to check.
     *
     * @return void
     * @throws InvalidArgumentException If the specified value is not an
     *                                  integer.
     */
    private static function throwInvalidArgumentExceptionIfArgumentIsNotInteger($value)
    {
        if (false === \is_int($value)) {
            throw new InvalidArgumentException(
                'The specified argument is not an integer.'
            );
        }
    }

    /**
     * Throws an {@see InvalidArgumentException} if the specified value is not
     * a positive number (`+1` to `\PHP_INT_MAX`).
     *
     * @param mixed $value The value to check.
     *
     * @return void
     * @throws InvalidArgumentException If the specified value is not a positive
     *                                  number.
     */
    private static function throwInvalidArgumentExceptionIfArgumentIsNotPositiveNumber($value)
    {
        if ($value < 1) {
            throw new InvalidArgumentException(
                'The specified argument is not a positive number.'
            );
        }
    }
}
