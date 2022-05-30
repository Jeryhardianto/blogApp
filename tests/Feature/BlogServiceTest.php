<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\BlogService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogServiceTest extends TestCase
{
    private BlogService $blogService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->blogService = app()->make(BlogService::class);
    }

    // public function testGetAll()
    // {
    //     $this->assertIsArray($this->blogService->getAll());
    // }
 

}
