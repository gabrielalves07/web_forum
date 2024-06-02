<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected $status,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $class = 'primary';
        $class = $this->status === 'C' ? 'success' : $class;
        $class = $this->status === 'P' ? 'danger' : $class;
        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'class'));
    }
}
