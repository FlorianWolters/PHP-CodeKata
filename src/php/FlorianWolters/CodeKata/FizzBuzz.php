<?php
namespace FlorianWolters\CodeKata;

use \InvalidArgumentException;

/**
 * The code kate {@see FizzBuzz}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 */
final class FizzBuzz
{
    /**
     * Specifies when (multiplicity) to print the string "Fizz" instead of the
     * number.
     *
     * @var integer
     */
    const FIZZ_NUMBER = 3;

    /**
     * The word "Fizz".
     *
     * @var string
     */
    const FIZZ_WORD = "Fizz";

    /**
     * Specifies when (multiplicity) to print the string "Buzz" instead of the
     * number.
     *
     * @var integer
     */
    const BUZZ_NUMBER = 5;

    /**
     * The word "Buzz".
     *
     * @var string
     */
    const BUZZ_WORD = "Buzz";

    /**
     * The word "FizzBuzz".
     *
     * @var string
     */
    const FIZZBUZZ_WORD = 'FizzBuzz';

    /**
     * Runs "FizzBuzz" with the specified number.
     *
     * @param integer $input The number to check.
     *
     * @return string|integer Either the input number, the string "Fizz", the
     *                        string "Buzz" or the string "FizzBuzz".
     *
     * @throws InvalidArgumentException If the specified number is not an
     *                                  integer.
     */
    public function calculateAsString($input)
    {
        $this->throwInvalidArgumentExceptionIfInputIsInvalid($input);

        $result = '';

        if (0 === ($input % self::FIZZ_NUMBER)) {
            $result = self::FIZZ_WORD;
        }

        if (0 === ($input % self::BUZZ_NUMBER)) {
            $result .= self::BUZZ_WORD;
        }

        if ('' === $result) {
            $result = $input;
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
     *
     * @throws InvalidArgumentException If the specified number is not an
     *                                  integer.
     */
    private function throwInvalidArgumentExceptionIfInputIsInvalid($value)
    {
        if (false === \is_int($value)) {
            throw new InvalidArgumentException;
        }
    }

    /**
     * Runs "FizzBuzz" with the specified range of numbers.
     *
     * @param integer $start The number to start with.
     * @param integer $end   The number to end with.
     *
     * @return array An array, where each element contains either the input
     *               number, the string "Fizz", the string "Buzz" or the string
     *               "FizzBuzz".
     */
    public function calculateAsArray($start = 1, $end = 100)
    {
        $result = [];

        for ($i = $start; $i <= $end; ++$i) {
            $result[] = $this->calculateAsString($i);
        }

        return $result;
    }
}
