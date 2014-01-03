<?php
namespace FlorianWolters\CodeKata\PenDrawing;

/**
 * Test class for {@see PenDrawing}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2014 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 *
 * @covers    FlorianWolters\CodeKata\PenDrawing\PenDrawing
 */
class PenDrawingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PenDrawing
     */
    private $penDrawing;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->penDrawing = new PenDrawing;
    }

    /**
     * @return array
     */
    public static function providerParseDrawingCommand()
    {
        return [
            ['P 2 # select pen 2', 'P', 2],
            ['D   # pen down', 'D', null],
            ['W 2 # draw west 2cm', 'W', 2],
            ['N 1 # then north 1', 'N', 1],
            ['E 2 # then east 2', 'E', 2],
            ['S 1 # then back south', 'S', 1],
            ['U   # pen up', 'U', null]
        ];
    }

    /**
     * @param string      $input
     * @param string      $expectedLetter
     * @param int|null    $expectedParameter
     *
     * @return void
     *
     * @coversDefaultClass parseDrawingCommand
     * @dataProvider providerParseDrawingCommand
     * @test
     */
    public function testParseDrawingCommand($input, $expectedLetter, $expectedParameter)
    {
        $command = $this->penDrawing->parseDrawingCommand($input);
        $actualLetter = $command->getLetter();
        $actualParameter = $command->getParameter();

        $this->assertEquals($expectedLetter, $actualLetter);
        $this->assertEquals($expectedParameter, $actualParameter);
    }

    /**
     * @return void
     *
     * @coversDefaultClass execute
     * @test
     */
    public function testExecute()
    {
        $sourceCode = "P 2 # select pen 2
D   # pen down
W 2 # draw west 2cm
N 1 # then north 1
E 2 # then east 2
S 1 # then back south
U   # pen up";

        $this->penDrawing->execute($sourceCode);
    }
}
