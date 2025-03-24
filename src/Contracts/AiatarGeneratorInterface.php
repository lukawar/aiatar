<?php

namespace Lukawar\Aiatar\Contracts;

interface AiatarInterface
{
    public function generate(string $prompt): string;
}