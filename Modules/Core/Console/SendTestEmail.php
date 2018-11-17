<?php

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;
use Modules\Core\Mail\TestEmail;

class SendTestEmail extends Command
{
    protected $signature = 'dev:send-test-email';

    private $mailer;

    public function __construct()
    {
        $this->mailer = app(Mailer::class);

        parent::__construct();
    }

    public function handle()
    {
        $template = $this->ask('Template Name');

        if (!view()->exists("development::markdown.{$template}")) {
            $this->info('Template Not Found');
            return;
        }

        $this->info('Sending Email');

        if ($this->sendEmail($template)) {
            $this->info('Email Sent Successfully');
        } else {
            $this->info('Email Not Sent');
        }
    }

    private function sendEmail(string $template): bool
    {
        try {

            $this->mailer->to('hello@example.com')
                ->send(new TestEmail($template));

            return true;

        } catch (\Exception $exception) {
            return false;
        }
    }
}
