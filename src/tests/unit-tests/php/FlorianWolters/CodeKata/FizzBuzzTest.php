<?php
namespace FlorianWolters\CodeKata;

/**
 * Test class for {@link FizzBuzz}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 *
 * @covers    FlorianWolters\CodeKata\FizzBuzz
 */
class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerCalculateAsString()
    {
        return [
            [1, 1],
            [2, 2],
            [3, FizzBuzz::FIZZ_WORD],
            [4, 4],
            [5, FizzBuzz::BUZZ_WORD],
            [6, FizzBuzz::FIZZ_WORD],
            [7, 7],
            [8, 8],
            [9, FizzBuzz::FIZZ_WORD],
            [10, FizzBuzz::BUZZ_WORD],
            [15, FizzBuzz::FIZZBUZZ_WORD]
        ];
    }

    /**
     * @param int        $input
     * @param string|int $expected
     *
     * @return void
     *
     * @coversDefaultClass calculateAsString
     * @dataProvider providerCalculateAsString
     * @test
     */
    public function testCalculateAsString($input, $expected)
    {
        $fizzBuzz = new FizzBuzz;
        $actual = $fizzBuzz->calculateAsString($input);

        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @return array
     */
    public static function providerCalculateAsArray()
    {
        return [
            [
                1,
                10, [
                    1,
                    2,
                    FizzBuzz::FIZZ_WORD,
                    4,
                    FizzBuzz::BUZZ_WORD,
                    FizzBuzz::FIZZ_WORD,
                    7,
                    8,
                    FizzBuzz::FIZZ_WORD,
                    FizzBuzz::BUZZ_WORD
                ]
            ]
        ];
    }

    /**
     * @param int   $start
     * @param int   $end
     * @param array $expected
     *
     * @return void
     *
     * @coversDefaultClass calculateAsArray
     * @dataProvider providerCalculateAsArray
     * @test
     */
    public function testCalculateAsArray($start, $end, $expected)
    {
        $fizzBuzz = new FizzBuzz;
        $actual = $fizzBuzz->calculateAsArray($start, $end);

        $this->assertEquals($expected, $actual);
    }
}
