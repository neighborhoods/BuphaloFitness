<?php

namespace Neighborhoods\BuphaloFitness\Demo1\V1;

interface SpeakerInterface
{
    public function say(string $speech): SpeakerInterface;
}
