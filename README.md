# FlorianWolters\CodeKata

[![Build Status](https://secure.travis-ci.org/FlorianWolters/PHP-CodeKata.png?branch=master)](http://travis-ci.org/FlorianWolters/PHP-CodeKata)
[![Build Status](https://secure.travis-ci.org/FlorianWolters/PHP-CodeKata.png?branch=master)](http://travis-ci.org/FlorianWolters/PHP-CodeKata)
[![Latest Stable Version](https://poser.pugx.org/florianwolters/code-kata/version.png)](https://packagist.org/packages/florianwolters/code-kata)
[![Latest Unstable Version](https://poser.pugx.org/florianwolters/code-kata/v/unstable.png)](https://packagist.org/packages/florianwolters/code-kata)

| Period of Time         | Number of Downloads                                                                                                                                                      |
| ----------------------:|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
| <small>Total</small>   | [![Total Downloads](https://poser.pugx.org/florianwolters/code-kata/downloads.png)](https://packagist.org/packages/florianwolters/code-kata)   |
| <small>Monthly</small> | [![Monthly Downloads](https://poser.pugx.org/florianwolters/code-kata/d/monthly.png)](https://packagist.org/packages/florianwolters/code-kata) |
| <small>Daily</small>   | [![Daily Downloads](https://poser.pugx.org/florianwolters/code-kata/d/daily.png)](https://packagist.org/packages/florianwolters/code-kata)     |

**FlorianWolters\CodeKata** provides [code kata][1] implementations in the [PHP][17] programming language.

## Table of Contents (ToC)

* [Introduction](#introduction)
* [Features](#features)
* [Requirements](#requirements)
* [License](#license)

## Introduction

A code kata is an exercise in programming which helps a programmer hone their skills through practice and repetition.

Currently, the project contains the following code katas:

* [TheFizzBuzzKata](http://codingdojo.org/cgi-bin/wiki.pl?KataFizzBuzz)
* [ThePrimeFactorsKata](http://butunclebob.com/ArticleS.UncleBob.ThePrimeFactorsKata)
  I've modified the original *ThePrimeFactorsKata* from Robert C. Martin (*Uncle Bob*) as follows:
  * My solution validates the specified argument.
  * I do not refactor the two `while`-loops into two `for`-loops, since the code looks more complicated then.
* [TheBowlingGameCata](http://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata)
  I've modified the original *TheBowlingGameCata* from Robert C. Martin (*Uncle Bob*) as follows:
  * My solution uses validation, whenever required.
    **Note:** Correct validation for the allowed number of rolls is currently missing.
  * My solution uses a constant instead of the magic number `10` for the number of pins.
  * The `private` method `rollStrike` has been moved from the test class to the implementation class and its visibility was changed to `public`.
  * The `private` method `sumOfBallsInFrame` has been renamed to `sumOfPinsInFrame`.
  * Prefix incrementation (`++$i`) is used instead of postfix incrementation (`$i++`), where applicable.
  * The method names of the test cases have been renamed to reflect their actual goal.

## Features

* Artifacts tested with both static and dynamic test procedures:
    * Dynamic component tests (unit tests) implemented using [PHPUnit][19].
    * Static code analysis performed using the following tools:
        * [PHP_CodeSniffer][14]: Style Checker
        * [PHP Mess Detector (PHPMD)][18]: Code Analyzer
        * [phpcpd][4]: Copy/Paste Detector (CPD)
        * [phpdcd][5]: Dead Code Detector (DCD)
* Follows the [PSR-0][6] requirements for autoloader interoperability.
* Follows the [PSR-1][7] basic coding style guide.
* Follows the [PSR-2][8] coding style guide.
* Follows the [Semantic Versioning][20] Specification (SemVer) 2.0.0-rc.1.

## Requirements

* [PHP][17] >= 5.4

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public License along with this program. If not, see <http://gnu.org/licenses/lgpl.txt>.

[1]: http://content.codersdojo.org/code-kata-catalogue
     "Code Kata Catalogue"
[4]: https://github.com/sebastianbergmann/phpcpd
     "sebastianbergmann/phpcpd · GitHub"
[5]: https://github.com/sebastianbergmann/phpdcd
     "sebastianbergmann/phpdcd · GitHub"
[6]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
     "PSR-0 requirements for autoloader interoperability"
[7]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
     "PSR-1 basic coding style guide"
[8]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
     "PSR-2 coding style guide"
[14]: http://pear.php.net/package/PHP_CodeSniffer
      "PHP_CodeSniffer"
[17]: http://php.net
      "PHP: Hypertext Preprocessor"
[18]: http://phpmd.org
      "PHPMD - PHP Mess Detector"
[19]: http://phpunit.de
      "sebastianbergmann/phpunit · GitHub"
[20]: http://semver.org
      "Semantic Versioning"
