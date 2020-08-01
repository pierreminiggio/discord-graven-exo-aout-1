<?php

namespace PierreMiniggio\DifferenceFinder;

use InvalidArgumentException;
use Exception;

class App
{
    private array $context;

    public function __construct(array $context)
    {
        $this->context = $context;
    }

    /**
     * @throws Exception
     */
    public function start(): void
    {
        if (! $this->enoughArgs()) {
            throw new InvalidArgumentException('use like this : php main.php [string1] [string2]');
        }

        if (! $this->areArgsSmeLength()) {
            throw new InvalidArgumentException('[string1] [string2] needs to be the same length');
        }

        echo (new StringDifferenceFinderAndReplacer('x'))->run($this->context[1], $this->context[2]);
    }

    private function enoughArgs(): bool
    {
        return count($this->context) === 3;
    }

    private function areArgsSmeLength(): bool
    {
        return strlen($this->context[1]) === strlen($this->context[2]);
    }
}
