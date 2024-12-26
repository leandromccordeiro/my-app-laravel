<?php

namespace App\View\Components\User;

use App\Models\User as ModelsUser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserList extends Component
{
    public $users;
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($type)
    {
        $this->users = ModelsUser::all();
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.user-list');
    }
}
