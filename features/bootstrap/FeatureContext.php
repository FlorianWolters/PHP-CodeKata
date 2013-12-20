<?php
use Behat\Behat\Context\BehatContext;
use FlorianWolters\CodeKata\BowlingGame;

require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context for the code cata {@see BowlingGame}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 * @since     Class available since Release 0.1.0
 */
class FeatureContext extends BehatContext
{
    /**
     * The {@see BowlingGame} instance under test.
     *
     * @var BowlingGame
     */
    private $game;

    /**
     * @Given /^I have started a new game of (\d+)-pin bowling$/
     */
    public function iHaveStartedANewGameOfPinBowling()
    {
        $this->game = new BowlingGame;
    }

    /**
     * @When /^I roll (\d+) gutter balls$/
     */
    public function iRollGutterBalls($times)
    {
        $this->rollMany($times, 0);
    }

    /**
     * @Then /^my score is (\d+) points$/
     */
    public function myScoreIsPoints($score)
    {
        assertEquals($score, $this->game->score());
    }

    /**
     * @When /^I knock over (\d+) pin[s]? (\d+) times$/
     */
    public function iKnockOverPinsTimes($pins, $times)
    {
        $this->rollMany($times, $pins);
    }

    /**
     * @When /^I knock over (\d+) pins$/
     */
    public function iKnockOverPins($pins)
    {
        $this->game->roll($pins);
    }

    /**
     * @When /^I roll (\d+) strikes$/
     */
    public function iRollStrikes($times)
    {
        $this->rollMany($times, 10);
    }

    /**
     * @When /^I roll (\d+) strike$/
     */
    public function iRollStrike()
    {
        $this->game->rollStrike();
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
}
