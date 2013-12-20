<?php
namespace FlorianWolters\CodeKata;

use \InvalidArgumentException;
use \LogicException;

/**
 * The code kate {@see BowlingGame}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2013 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 * @since     Class available since Release 0.1.0
 */
final class BowlingGame
{
    /**
     * The number of pins in a {@see BowlingGame}.
     *
     * @var integer
     */
    const NUMBER_OF_PINS = 10;

    /**
     * The number of frames in a {@see BowlingGame}.
     *
     * @var integer
     */
    const NUMBER_OF_FRAMES = 10;

    /**
     * The maximum number of rolls possible in a {@see BowlingGame}.
     *
     * The maximum number of rolls can be reached as follows:
     * * Bowl 18-times a `0` to `9`.
     * * Bowl a *Spare* in the 10th frame to get the additional roll.
     * * Bowl anything in the additional roll.
     *
     * @var integer
     */
    const MAXIMUM_NUMBER_OF_ROLLS = 21;

    /**
     * The number of pins for each roll.
     *
     * @var array
     */
    private $rolls = [];

    /**
     * The index of the current roll.
     *
     * @var integer
     */
    private $currentRoll = 0;

    /**
     * The number of rolls left for this {@see BowlingGame}.
     *
     * @var integer
     */
    private $rollsLeft = self::MAXIMUM_NUMBER_OF_ROLLS;

    /**
     * Creates a new instance of the {@see BowlingGame} class.
     */
    public function __construct()
    {
        for ($i = 0; $i < self::MAXIMUM_NUMBER_OF_ROLLS; ++$i) {
            $this->rolls[$i] = 0;
        }
    }

    /**
     * Rolls a strike (10 pins).
     *
     * Calling this method has the same effect as calling {@see roll(10)}.
     *
     * @return void
     */
    public function rollStrike()
    {
        $this->roll(self::NUMBER_OF_PINS);
    }

    /**
     * Rolls the specified number of pins.
     *
     * @param integer $pins The number of pins knocked down.
     *
     * @return void
     * @throws InvalidArgumentException If the specified number of knocked down
     *                                  pins is invalid.
     */
    public function roll($pins)
    {
        $this->throwInvalidArgumentExceptionIfNumberOfKnockedDownPinsIsInvalid($pins);

        // TODO Fix detection for invalid number of rolls.
        --$this->rollsLeft;
        $this->throwInvalidArgumentExceptionIfNoRollsLeft();

        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * Throws an {@see InvalidArgumentException} if the specified number of
     * knocked down pins is invalid.
     *
     * @param integer $pins The number of pins knocked down.
     *
     * @return void
     * @throws InvalidArgumentException If the specified number of knocked down
     *                                  pins is invalid.
     */
    private function throwInvalidArgumentExceptionIfNumberOfKnockedDownPinsIsInvalid($pins)
    {
        if ($pins < 0 || $pins > self::NUMBER_OF_PINS) {
            throw new InvalidArgumentException(
                'The specified number of knocked down pins is invalid.'
            );
        }
    }

    /**
     * Throws a {@see LogicException} if no more rolls are left in this {@see
     * BowlingGame}.
     *
     * @return void
     * @throws LogicException If no more rolls are left.
     */
    private function throwInvalidArgumentExceptionIfNoRollsLeft()
    {
        if (0 === $this->rollsLeft) {
            throw new LogicException('No more rolls left.');
        }
    }

    /**
     * Returns the total score of this {@see BowlingGame}.
     *
     * @return integer The total score.
     */
    public function score()
    {
        $score = 0;
        $frameIndex = 0;

        for ($frame = 0; $frame < self::NUMBER_OF_FRAMES; ++$frame) {
            if (true === $this->isStrike($frameIndex)) {
                $score += self::NUMBER_OF_PINS + $this->strikeBonus($frameIndex);
                ++$frameIndex;
            } elseif (true === $this->isSpare($frameIndex)) {
                $score += self::NUMBER_OF_PINS + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->sumOfPinsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }

        return $score;
    }

    /**
     * Checks whether a strike has been rolled in the specified frame.
     *
     * @param integer $frameIndex The index of the frame.
     *
     * @return bool `true` if a strike has been rolled, or `false` otherwise.
     */
    private function isStrike($frameIndex)
    {
        return self::NUMBER_OF_PINS === $this->rolls[$frameIndex];
    }

    /**
     * Calculates and returns the bonus score for a strike in the specified
     * frame.
     *
     * @param integer $frameIndex The index of the frame.
     *
     * @return integer The bonus for the strike.
     */
    private function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
    }

    /**
     * Checks whether a spare has been rolled in the specified frame.
     *
     * @param integer $frameIndex The index of the frame.
     *
     * @return bool `true` if a spare has been rolled, or `false` otherwise.
     */
    private function isSpare($frameIndex)
    {
        return self::NUMBER_OF_PINS === $this->sumOfPinsInFrame($frameIndex);
    }

    /**
     * Calculates and returns the bonus score for a spare in the specified
     * frame.
     *
     * @param integer $frameIndex The index of the frame.
     *
     * @return integer The bonus for the spare.
     */
    private function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 2];
    }

    /**
     * Calculates and returns the sum of the knocked down pins in the specified
     * frame.
     *
     * @param integer $frameIndex The index of the frame.
     *
     * @return integer The sum of the knocked down pins.
     */
    private function sumOfPinsInFrame($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
    }
}
