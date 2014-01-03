<?php
namespace FlorianWolters\CodeKata\PenDrawing;

/**
 * The class {@see DrawingCommand} encapsulates a command for drawing used by
 * the code kate {@see PenDrawing}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2014 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 */
final class DrawingCommand
{
    /**
     * The name of this {@see DrawingCommand}.
     *
     * @var string
     */
    private $name;

    /**
     * The optional parameter of this {@see DrawingCommand}.
     *
     * @var int
     */
    private $parameter;

    /**
     * Initializes a new instance of the {@see DrawingCommand} class.
     *
     * @param string      $name      The name of.
     * @param int|null    $parameter The optional parameter.
     */
    public function __construct($name, $parameter = null)
    {
        $this->name = $name;
        $this->parameter = $parameter;
    }

    public function getLetter()
    {
        return $this->name;
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    public function hasParameter()
    {
        return null !== $this->parameter;
    }
}
