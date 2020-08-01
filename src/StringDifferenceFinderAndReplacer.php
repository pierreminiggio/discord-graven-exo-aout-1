<?php

namespace PierreMiniggio\DifferenceFinder;

class StringDifferenceFinderAndReplacer
{

    private string $replacement;

    public function __construct(string $replacement)
    {
        $this->replacement = $replacement;
    }

    public function run(string $string1, string $string2): string
    {
        $a1 = str_split($string1);
        $a2 = str_split($string2);

        $res = '';

        for ($i = 0; $i < count($a1); $i++) {
            $res .= $a1[$i] === $a2[$i] ? $a1[$i] : $this->replacement;
        }

        return $res;
    }
}
