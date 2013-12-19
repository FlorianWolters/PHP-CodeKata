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
     */
    public static function generate($n)
    {
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
}
