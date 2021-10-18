<?php

//namespace Tests\Unit;

use App\Models\Advert;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
uses(Tests\TestCase::class, RefreshDatabase::class);


it("Should save new advert with status 201", function () {
    $advert = Advert::factory()->create([])->toArray();
    $advert['files'] = Array(UploadedFile::fake()->image('avatar.jpg'),
        UploadedFile::fake()->image('avatar2.jpg'));
    $response = $this->postJson('/api/adverts', $advert);
    $response->assertStatus(201);
});

it("Should return status 422, fields required", function () {
    $response = $this->postJson('/api/adverts', []);
    $response->assertStatus(422);
});

it("Should return status 200, valid response", function () {
    $response = $this->get('/api/adverts');
    $response->assertStatus(200);
});
