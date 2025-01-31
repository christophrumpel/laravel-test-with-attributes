<?php


use App\Models\Post;
use App\Models\User;
use App\PostStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\assertDatabaseHas;

uses(RefreshDatabase::class);

it('creates hidden post', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $user->hiddenPosts()->create(['title' => 'Hidden Podcast', 'status' => PostStatus::Draft]);

    // Assert
    assertDatabaseHas(Post::class, [
        'title' => 'Hidden Podcast',
        'status' => PostStatus::Draft,
        'hidden' => true,
    ]);
});

it('creates archived post', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $user->archivedPosts()->create(['title' => 'Hidden Post', 'hidden' => false]);

    // Assert
    assertDatabaseHas(Post::class, [
        'title' => 'Hidden Post',
        'status' => PostStatus::Archived,
        'hidden' => false,
    ]);
});

it('creates group laravel post', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $user->groupLaravelPost()->create([
        'title' => 'Group Laravel Post',
        'hidden' => false,
        'status' => PostStatus::Draft
    ]);

    // Assert
    assertDatabaseHas(Post::class, [
        'title' => 'Group Laravel Post',
        'status' => PostStatus::Draft,
        'hidden' => false,
        'group' => 'laravel'
    ]);
});

