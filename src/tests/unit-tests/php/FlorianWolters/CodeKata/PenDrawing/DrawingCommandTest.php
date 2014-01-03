<?php
namespace FlorianWolters\CodeKata\PenDrawing;

/**
 * Test class for {@see DrawingCommand}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2014 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 *
 * @covers    FlorianWolters\CodeKata\PenDrawing\DrawingCommand
 */
class DrawingCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DrawingCommand
     */
    private $drawingCommand;

    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->drawingCommand = new DrawingCommand('P', 2);
    }

    /**
     * @return void
     *
     * @coversDefaultClass getName
     * @test
     */
    public function testGetName()
    {
        $expected = 'P';
        $actual = $this->drawingCommand->getLetter();

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return void
     *
     * @coversDefaultClass getValue
     * @test
     */
    public function testGetValue()
    {
        $expected = 2;
        $actual = $this->drawingCommand->getParameter();

        $this->assertEquals($expected, $actual);
    }
}
