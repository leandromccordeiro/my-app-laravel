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
    public $cardClass;
    /**
     * Create a new component instance.
     */
    public function __construct($users = null, $type = 'lista', $cardClass = 'success')
    {
        $this->users = $users;
        $this->type = $type;
        $this->cardClass = $cardClass;
    }

    public function isSelected($userId)
    {
        return $userId === 3;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.user-list');
    }
}
