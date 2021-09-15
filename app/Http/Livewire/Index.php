<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\User;
use App\Http\Controllers\DateTimeZoneController;

class Index extends Component
{
    public function render()
    {
        $events = Event::latest('updated_at')->paginate(6);

        $obj = new DateTimeZoneController();
        $date = $obj->getDateTimeZone();
        
        return view('livewire.index', compact('events', 'date'));
    }
}
