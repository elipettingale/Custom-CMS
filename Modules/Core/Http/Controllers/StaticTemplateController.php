<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use Illuminate\Mail\Markdown;

class StaticTemplateController extends Controller
{
    private $pdfGenerator;

    public function __construct(PDF $pdfGenerator)
    {
        $this->pdfGenerator = $pdfGenerator;
    }

    public function show(string $template)
    {
        $path = "static.standard.$template";

        if (view()->exists($path)) {
            return view($path);
        }

        return null;
    }

    public function markdown(string $template)
    {
        $path = "static.markdown.$template";

        if (view()->exists($path)) {
            $markdown = new Markdown(view(), config('mail.markdown'));
            return $markdown->render($path);
        }

        return null;
    }

    public function pdf(string $template)
    {
        $path = "static.pdf.$template";

        if (view()->exists($path)) {
            $this->pdfGenerator->loadHTML(view($path));
            return $this->pdfGenerator->stream();
        }

        return null;
    }
}
