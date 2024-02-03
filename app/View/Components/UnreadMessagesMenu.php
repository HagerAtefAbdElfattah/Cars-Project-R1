<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UnreadMessagesMenu extends Component
{
    public $unreadMessages;
    /**
     * Create a new component instance.
     */
    public function __construct($unreadMessages)
    {
        $this->unreadMessages = $unreadMessages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.unread-messages-menu');
    }
}
