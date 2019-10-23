#! /usr/bin/env php
<?php

use Neighborhoods\BuphaloFitness\Demo1\V1\Speaker;

require_once (__DIR__ . '/../vendor/autoload.php');

$speaker = new Speaker();

$speaker->say('Hello Neighbors!');
