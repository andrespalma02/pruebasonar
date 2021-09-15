<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;

class DateTimeZoneController extends Controller
{
    public function getDateTimeZone()
    {
        /* Obtiene la fecha y hora situado en Bogota */
        $tz_object = new DateTimeZone('America/Bogota');
        
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format("Y-m-d\TH:i");
    }
}
