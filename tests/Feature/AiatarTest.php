<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Lukawar\Aiatar\Aiatar;
use Tests\TestCase;

class AiatarTest extends TestCase
{
    public function test_generate_image()
    {
        $aiatar = app(Aiatar::class);
        $image = $aiatar->generate('Test avatar');

        $this->assertNotEmpty($image);
        $this->assertGreaterThan(1000, strlen($image));
    }

    public function test_store_generated_image()
    {
        Storage::fake('public');
        $aiatar = app(Aiatar::class);

        $image = $aiatar->generate('A knight in golden armor');
        $filename = 'test-avatar.png';

        Storage::disk('public')->put($filename, $image);

        Storage::disk('public')->assertExists($filename);
    }
}