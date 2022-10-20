<?php

namespace App\View\Components;

use App\Models\Team;
use Illuminate\View\Component;

class TeamMember extends Component
{
    /**
     * @var \App\Models\Team
     */
    public Team $team;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.team-member');
    }
}
