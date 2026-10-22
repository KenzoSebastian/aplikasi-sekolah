<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Route;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */

    public $routes = [
        ["name" => "Home", "route" => "home", "img" => "menu"],
        ["name" => "Students", "route" => "students.index", "img" => "student"],
        ["name" => "Teachers", "route" => "teachers.index", "img" => "teacher"]
    ];

    public function __construct() {}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view("components.sidebar");
    }
}
