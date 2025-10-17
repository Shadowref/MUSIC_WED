<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminNavLink extends Component
{
    public string $href;
    public bool $active;

    /**
     * @param  string  $href   URL của link
     * @param  bool    $active Có đang active hay không
     */
    public function __construct(string $href, bool $active = false)
    {
        $this->href   = $href;
        $this->active = $active;
    }

    public function render()
    {
        return view('components.admin-nav-link');
    }
}
