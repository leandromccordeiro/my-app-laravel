<?php

namespace App\View\Components;

use App\Models\User as ModelsUser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class User extends Component
{
    public $users;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->users = ModelsUser::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user');
    }
}
