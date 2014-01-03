<?php
namespace FlorianWolters\CodeKata;

/**
 * Test class for the code kata *TheBowlingGame*.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 *
 * @covers    FlorianWolters\CodeKata\BowlingGame
 */
class BowlingGameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The {@see BowlingGame} instance under test.
     *
     * @var BowlingGame
     */
    private $bowlingGame;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->bowlingGame = new BowlingGame;
    }

    /**
     * @return void
     *
     * @coversDefaultClass score
     * @test
     */
    public function testScoreForGutterGameIs0()
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->bowlingGame->score());
    }

    /**
     * @return void
     *
     * @coversDefaultClass score
     * @test
     */
    public function testScoreForPerfectGameIs300()
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->bowlingGame->score());
    }

    /**
     * @return void
     *
     * @coversDefaultClass score
     * @test
     */
    public function testScoreForAllOnesIs20()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->bowlingGame->score());
    }

    /**
     * @return void
     *
     * @coversDefaultClass score
     * @test
     */
    public function testScoreForOneSpareAnd3Is16()
    {
        $this->rollSpare();
        $this->bowlingGame->roll(3);
        $this->rollMany(17, 0);

        $this->assertEquals(16, $this->bowlingGame->score());
    }

    /**
     * @return void
     *
     * @coversDefaultClass score
     * @test
     */
    public function testScoreForOneStrikeAnd3And4Is24()
    {
        $this->bowlingGame->rollStrike();
        $this->bowlingGame->roll(3);
        $this->bowlingGame->roll(4);
        $this->rollMany(16, 0);

        $this->assertEquals(24, $this->bowlingGame->score());
    }

    /**
     * @return void
     *
     * @coversDefaultClass roll
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testRollThrowsInvalidArgumentExceptionForMinus1()
    {
        $this->bowlingGame->roll(-1);
    }

    /**
     * @return void
     *
     * @coversDefaultClass roll
     * @expectedException \InvalidArgumentException
     * @test
     */
    public function testRollThrowsInvalidArgumentExceptionFor11()
    {
        $this->bowlingGame->roll(11);
    }

    /**
     * @return void
     *
     * @coversDefaultClass roll
     * @expectedException \LogicException
     * @test
     */
    public function test21RollsForGutterGameThrowsLogicException()
    {
        $this->rollMany(21, 0);
    }

    /**
     * @return void
     *
     * @coversDefaultClass roll
     * @expectedException \LogicException
     * @test
     */
    public function testLogicExceptionForNineteenZeroesAndThreeStrikes()
    {
        $this->rollMany(19, 1);
        $this->rollMany(3, 10);
    }

    /**
     * @return void
     *
     * @coversDefaultClass roll
     * @expectedException \LogicException
     * @test
     */
    public function test13RollsForPerfectGameThrowsLogicException()
    {
        $this->rollMany(13, 10);
        $this->markTestSkipped();
    }

    /**
     * @param int $times
     * @param int $pins
     *
     * @return void
     */
    private function rollMany($times, $pins)
    {
        for ($i = 0; $i < $times; ++$i) {
            $this->bowlingGame->roll($pins);
        }
    }

    /**
     * @return void
     */
    private function rollSpare()
    {
        $this->bowlingGame->roll(5);
        $this->bowlingGame->roll(5);
    }
}
