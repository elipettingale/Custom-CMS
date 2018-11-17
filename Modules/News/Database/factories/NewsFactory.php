<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;
use Modules\Core\Enums\Status;

/**
 * @var Factory $factory
 */
$factory->define(Post::class, function(Faker $faker) {
    $status = $faker->randomElement([Status::DRAFT, Status::LIVE]);
    $categories = PostCategory::all()->pluck('id')->toArray();
    $categories[] = null;

    return [
        'title' => ucwords($faker->words(4, true)),
        'content' => $faker->paragraphs(3, true),
        'status' => $status,
        'category_id' => $faker->randomElement($categories),
        'published_at' => $status === 'live' ? \Carbon\Carbon::now()->subDays(random_int(0, 180)) : null
    ];
});

/**
 * @var Factory $factory
 */
$factory->define(PostCategory::class, function(Faker $faker) {
    return [
        'name' => ucwords($faker->words(2, true)),
    ];
});
