<?php
namespace FlorianWolters\CodeKata;

/**
 * Test class for {@link PrimeFactors}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 * @since     Class available since Release 0.1.0
 *
 * @covers    FlorianWolters\CodeKata\FizzBuzz
 */
class PrimeFactorsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public static function providerGenerate()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [9, [3, 3]]
        ];
    }

    /**
     * @param integer $input
     * @param array   $expected
     *
     * @return void
     *
     * @coversDefaultClass generate
     * @dataProvider providerGenerate
     * @test
     */
    public function testGenerate($input, $expected)
    {
        $actual = PrimeFactors::generate($input);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public static function providerGenerateThrowsInvalidArgumentException()
    {
        return [
            [0],
            [-1],
            [null],
            [false],
            [.1],
            ['foo'],
            [new \stdClass]
        ];
    }

    /**
     * @param integer $input
     *
     * @return void
     *
     * @coversDefaultClass generate
     * @dataProvider providerGenerateThrowsInvalidArgumentException
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testGenerateThrowsInvalidArgumentExceptionForInvalidInput($input)
    {
        PrimeFactors::generate($input);
    }
}
