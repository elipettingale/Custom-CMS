<?php

namespace Modules\News\Database\Seeders\Post;

use Illuminate\Database\Seeder;
use Modules\Media\Repositories\MediaRepository;
use Modules\News\Entities\Post;
use Modules\News\Repositories\PostRepository;

class PostSeeder extends Seeder
{
    private $postRepository;
    private $mediaRepository;

    public function __construct(PostRepository $postRepository, MediaRepository $mediaRepository)
    {
        $this->postRepository = $postRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function run()
    {
        /** @var array $posts */
        $posts = factory(Post::class, (int) $this->command->ask('Number of Posts', 0))->raw();

        foreach ($posts as $post) {
            $post = $this->postRepository->create($post);
            $this->mediaRepository->copy($post, stock_image_path(), 'featured_image');
        }
    }
}
