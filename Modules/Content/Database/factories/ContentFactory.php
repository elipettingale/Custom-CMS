<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Modules\Content\Entities\Page;
use Modules\Core\Enums\Status;
use Modules\Content\Repositories\PageTemplateRepository;

/**
 * @var Factory $factory
 */
$factory->define(Page::class, function(Faker $faker) {
    $template = $faker->randomElement(app(PageTemplateRepository::class)->getAll()->toArray());

    $data = [
        'title' => ucwords($faker->words(4, true)),
        'template' => $template->key,
        'status' => $faker->randomElement([Status::DRAFT, Status::LIVE])
    ];

    if ($template->key === 'basic') {
        return array_merge($data, [
            'data' => [
                'content' => $faker->paragraphs(3, true)
            ]
        ]);
    }

    if ($template->key === 'col-2') {
        return array_merge($data, [
            'data' => [
                'content_left' => $faker->paragraphs(3, true),
                'content_right' => $faker->paragraphs(3, true)
            ]
        ]);
    }

    return $data;
});
