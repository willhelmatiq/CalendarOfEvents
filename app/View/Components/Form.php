<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public string $method;

    public string $title;

    public string $route;

    public string $submit;

    public function __construct(string $method, string $title, string $route, string $submit)
    {
        $this->method = $method;
        $this->title = $title;
        $this->route = $route;
        $this->submit = $submit;
    }

    public function render()
    {
        return view('components.form');
    }
}
