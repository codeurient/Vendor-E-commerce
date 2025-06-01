<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{

    public function __construct()
    {
        //
    }



    public function render(): View|Closure|string
    {
        return <<<'blade'
                        <div>
                            <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
                        </div>
                    blade;
    }
}
