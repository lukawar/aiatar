<?php

namespace Lukawar\Aiatar\Services;

use Lukawar\Aiatar\Contracts\AiatarInterface;
use Illuminate\Support\Facades\Http;

class GeminiAiatar implements AiatarInterface
{
    public function generate(string $prompt): string
    {
        $apiKey = config('aiatar.gemini.api_key');
        $url = config('aiatar.gemini.url') . config('aiatar.gemini.model') . ":generateContent?key={$apiKey}";

        $response = Http::post($url, [
            "contents" => [["parts" => [["text" => $prompt]]]],
            "generationConfig" => ["responseModalities" => ["Text", "Image"]],
        ]);

        $data = $response->json();
        if (!isset($data['candidates'][0]['content']['parts'][0]['inlineData']['data'])) {
            throw new \Exception('Image generation failed');
        }

        return base64_decode($data['candidates'][0]['content']['parts'][0]['inlineData']['data']);
    }
}