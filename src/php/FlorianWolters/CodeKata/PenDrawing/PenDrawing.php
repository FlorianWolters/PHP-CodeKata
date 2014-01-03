<?php
namespace FlorianWolters\CodeKata\PenDrawing;

use \InvalidArgumentException;

/**
 * The code kate {@see PenDrawing}.
 *
 * @author    Florian Wolters <wolters.fl@gmail.com>
 * @copyright 2014 Florian Wolters
 * @license   http://gnu.org/licenses/lgpl.txt LGPL-3.0+
 * @link      http://github.com/FlorianWolters/PHP-CodeKata
 */
final class PenDrawing
{
    /**
     * @var array
     */
    private static $commands = [
        'P' => 'selectPen',
        'U' => 'penUp',
        'D' => 'penDown',
        'N' => 'movePen',
        'E' => 'movePen',
        'S' => 'movePen',
        'W' => 'movePen'
    ];

    /**
     * @var PenCommander
     */
    private $commander;

    public function __construct()
    {
        // TODO Fix violation of IoC and introduce command pattern.
        $this->commander = new PenCommander;
    }

    /**
     * @param string $sourceCode
     *
     * @return void
     */
    public function execute($sourceCode)
    {
        $lines = \explode("\n", $sourceCode);

        foreach ($lines as $line) {
            try {
                $command = $this->parseDrawingCommand($line);
                $methodName = self::$commands[$command->getLetter()];
                \call_user_func([$this->commander, $methodName], $command->getParameter());
            } catch (InvalidArgumentException $ex) {
                throw new DrawingParserException('Unable to parse line: ' . $line);
            }
        }
    }

    public function parseDrawingCommand($line)
    {
        $pattern = '/^([A-Z]){1}(?:\s*([0-9]))?.*/';
        $matches = [];
        $success = \preg_match($pattern, $line, $matches);

        if (false === $success || \count($matches) < 1) {
            throw new InvalidArgumentException('Invalid format.');
        }

        $commandName = $matches[1];
        // Supress warnings, since the value and the comment of a command can be
        // optional.
        $commandValue = @$matches[2];

        return new DrawingCommand($commandName, $commandValue);
    }
}
