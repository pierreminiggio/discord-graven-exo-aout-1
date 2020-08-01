<?php

namespace PierreMiniggio\DifferenceFinder\Tests;

use PHPUnit\Framework\TestCase;
use PierreMiniggio\DifferenceFinder\StringDifferenceFinderAndReplacer;

class StringDifferenceFinderAndReplacerTest extends TestCase
{
    public function testGivenData(): void
    {
        $testData = [
            [
                '\(OwO)/',
                '\(Owo)/',
                '\(Owx)/'
            ],
            [
                " _[ ]_
                \('o')/
                 ( : ) ",
                " _[ ]_
                /('-')\
                |( : )|",
                " _[ ]_
                x('x')x
                x( : )x"
            ],
            [
                "         (__)
                (oo)
         /-------\/
        / |     ||
       *  ||----||
          ~~    ~~",
                "         (__)
                (oo)
         ________\/
        / |     ||
       *  ||----||
          ~~    ~~",
                "         (__)
                (oo)
         xxxxxxxx\/
        / |     ||
       *  ||----||
          ~~    ~~"
            ],
            [
                "hello",
                "hello",
                "hello"
            ]
        ];

        $finderAndReplacer = new StringDifferenceFinderAndReplacer('x');

        foreach ($testData as $data) {
            $this->assertSame($data[2], $finderAndReplacer->run($data[0], $data[1]));
        }
    }
}
