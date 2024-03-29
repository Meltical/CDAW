<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $id;
    public $title;
    public $subtitle;
    public $image_url;
    public $route;
    public $isRedirect;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $subtitle, $image_url, $route, $isRedirect = true)
    {
        $this->id = $id;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->image_url = $image_url;
        $this->route = $route;
        $this->isRedirect = $isRedirect;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
