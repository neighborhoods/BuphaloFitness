<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo1\V1;

class Speaker implements SpeakerInterface
{
    public function say(string $speech): SpeakerInterface
    {
        echo "$speech" . PHP_EOL;

        return $this;
    }
}
