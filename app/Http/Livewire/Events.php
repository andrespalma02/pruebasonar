<?php

namespace App\Http\Livewire;

use DateTime;
use DateTimeZone;
use Livewire\Component;
use App\Http\Controllers\DateTimeZoneController;

class Events extends Component
{       
    
    /* Este es el formulario para crear un evento*/
    public function render()
    {
        
        $obj = new DateTimeZoneController();
        $date = $obj->getDateTimeZone();
        
        return view('livewire.events')->with('date', $date);
    }
}
