<?php

namespace Modules\Core\Mail;

use Illuminate\Mail\Mailable;

class TestEmail extends Mailable
{
    private $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function build()
    {
        return $this->markdown("development::markdown.{$this->template}");
    }
}
