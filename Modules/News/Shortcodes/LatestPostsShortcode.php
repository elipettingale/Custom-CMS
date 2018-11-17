<?php

namespace Modules\News\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class LatestPostsShortcode implements Shortcode
{
    public function pattern(): string
    {
        return 'latest_(?<count>[^\}]+)_posts';
    }

    /**
     * @param array $args
     * @return string
     * @throws \Throwable
     */
    public function render(array $args): string
    {
        return view('news::frontend.post.latest', [
           'count' => $args['count']
        ])->render();
    }
}
