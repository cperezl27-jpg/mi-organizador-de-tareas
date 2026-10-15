<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function switch($locale)
    {
        $session = session();
        if (in_array($locale, ['en', 'es'])) {
            $session->set('lang', $locale);
        }
        return redirect()->back();
    }
}
