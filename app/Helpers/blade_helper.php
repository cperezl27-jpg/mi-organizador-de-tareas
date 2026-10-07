<?php

use eftec\bladeone\BladeOne;

if (! function_exists('blade')) {
    function blade(string $view, array $data = []): string
    {
        $blade = new BladeOne(
            APPPATH . 'Views',
            WRITEPATH . 'cache/blade',
            BladeOne::MODE_AUTO
        );

        return $blade->run($view, $data);
    }
}
