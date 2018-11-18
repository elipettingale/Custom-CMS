<?php

namespace Modules\News\Shortcodes;

use Modules\Core\Contracts\Shortcode;

class LatestPostsShortcode implements Shortcode
{
    public function signature(): string
    {
        return 'latest_posts';
    }

    /**
     * @param string $content
     * @return string
     * @throws \Throwable
     */
    public function render(string $content): string
    {
        return view('news::frontend.post.latest', [
           'count' => $content
        ])->render();
    }
}
