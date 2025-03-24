<?php

namespace Lukawar\Aiatar\Services;

use Lukawar\Aiatar\Contracts\AiatarInterface;
use Illuminate\Support\Facades\Http;

class OpenAiAiatar implements AiatarInterface
{
    public function generate(string $prompt): string
    {
        $apiKey = config('aiatar.openai.api_key');
        $url = config('aiatar.openai.url');

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
        ])->post($url, [
            'model' => config('aiatar.openai.model'),
            'prompt' => $prompt,
            'n' => 1,
            'size' => '512x512',
        ]);

        $data = $response->json();
        if (!isset($data['data'][0]['url'])) {
            throw new \Exception('Image generation failed');
        }

        return file_get_contents($data['data'][0]['url']);
    }
}