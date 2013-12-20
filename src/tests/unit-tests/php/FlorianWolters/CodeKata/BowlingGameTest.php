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
    private $game;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->game = new BowlingGame;
    }

    /**
     * @return void
     */
    public function testScoreForGutterGameIs0()
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->game->score());
    }

    /**
     * @return void
     */
    public function testScoreForPerfectGameIs300()
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->game->score());
    }

    /**
     * @return void
     */
    public function testScoreForAllOnesIs20()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->game->score());
    }

    /**
     * @return void
     */
    public function testScoreForOneSpareAnd3Is16()
    {
        $this->rollSpare();
        $this->game->roll(3);
        $this->rollMany(17, 0);

        $this->assertEquals(16, $this->game->score());
    }

    /**
     * @return void
     */
    public function testScoreForOneStrikeAnd3And4Is24()
    {
        $this->game->rollStrike();
        $this->game->roll(3);
        $this->game->roll(4);
        $this->rollMany(16, 0);

        $this->assertEquals(24, $this->game->score());
    }

    /**
     * @return void
     *
     * @expectedException \InvalidArgumentException
     */
    public function testScoreThrowsInvalidArgumentExceptionForMinus1()
    {
        $this->game->roll(-1);
    }

    /**
     * @return void
     *
     * @expectedException \InvalidArgumentException
     */
    public function testScoreThrowsInvalidArgumentExceptionFor11()
    {
        $this->game->roll(11);
    }

    /**
     * @return void
     *
     * @expectedException \LogicException
     */
    public function test21RollsForGutterGameThrowsLogicException()
    {
        $this->rollMany(21, 0);
    }

    /**
     * @return void
     *
     * @expectedException \LogicException
     */
    public function testLogicExceptionForNineteenZeroesAndThreeStrikes()
    {
        $this->rollMany(19, 1);
        $this->rollMany(3, 10);
    }

    /**
     * @return void
     *
     * @expectedException \LogicException
     */
    public function test13RollsForPerfectGameThrowsLogicException()
    {
        $this->rollMany(13, 10);
        $this->markTestSkipped();
    }

    /**
     * @param integer $times
     * @param integer $pins
     *
     * @return void
     */
    private function rollMany($times, $pins)
    {
        for ($i = 0; $i < $times; ++$i) {
            $this->game->roll($pins);
        }
    }

    /**
     * @return void
     */
    private function rollSpare()
    {
        $this->game->roll(5);
        $this->game->roll(5);
    }
}
