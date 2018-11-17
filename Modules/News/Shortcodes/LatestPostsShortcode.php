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
     * @param string $count
     * @return string
     * @throws \Throwable
     */
    public function render(string $count): string
    {
        return view('news::frontend.post.latest', [
           'count' => $count
        ])->render();
    }
}
