<?php
namespace Tests\Feature;use App\Models\User;use Illuminate\Foundation\Testing\RefreshDatabase;use Tests\TestCase;class AdminAuthorizationTest extends TestCase{use RefreshDatabase;public function test_client_cannot_access_admin_routes():void{$u=User::factory()->create(['role'=>'client']);$this->actingAs($u)->getJson('/api/v1/admin/users')->assertForbidden();}}
