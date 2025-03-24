<?php

namespace Lukawar\Aiatar\Factories;

use Lukawar\Aiatar\Contracts\AiatarInterface;
use Lukawar\Aiatar\Services\GeminiAiatar;
use Lukawar\Aiatar\Services\OpenAiAiatar;

class AiatarFactory
{
    public static function make(): AiatarInterface
    {
        return match (config('aiatar.default')) {
            'gemini' => new GeminiAiatar(),
            'openai' => new OpenAiAiatar(),
            default => throw new \Exception("Invalid AI model"),
        };
    }
}