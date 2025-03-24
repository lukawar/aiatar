<?php

namespace Lukawar\Aiatar;

use Lukawar\Aiatar\Contracts\AiatarInterface;
use Lukawar\Aiatar\Factories\AiatarFactory;

class Aiatar
{
    protected AiatarInterface $generator;

    public function __construct()
    {
        $this->generator = AiatarFactory::make();
    }

    public function generate(string $prompt): string
    {
        return $this->generator->generate($prompt);
    }
}