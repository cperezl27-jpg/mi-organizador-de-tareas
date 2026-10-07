<?php

namespace App\Controllers;

class Lang extends BaseController
{
    public function set(string $lang)
    {
        if (in_array($lang, ['en', 'es'], true)) {
            session()->set('lang', $lang);
        }

        return redirect()->back();
    }
}
