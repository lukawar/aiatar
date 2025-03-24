<?php

return [
  'default' => env('AIATAR_GENERATOR_MODEL', 'gemini'),

  'gemini' => [
    'api_key' => env('GEMINI_API_KEY'),
    'model' => env('GEMINI_MODEL', 'gemini-2.0-flash-exp-image-generation'),
    'url' => env('GEMINI_URL', 'https://generativelanguage.googleapis.com/v1beta/models/'),
  ],

  'openai' => [
    'api_key' => env('OPENAI_API_KEY'),
    'model' => env('OPENAI_MODEL', 'dall-e-3'),
    'url' => env('OPENAI_URL', 'https://api.openai.com/v1/images/generations'),
  ],

  'size' => env('AIATAR_IMAGE_SIZE', '320x320'),
];