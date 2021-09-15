<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Http\Controllers\DateTimeZoneController;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(EventRequest $request)
    {
        if ($request) {
            $events = Event::create($request->all());

            if ($request->file('file')) {
                $url = Storage::put('events', $request->file('file'));
                $events->image()->create([
                    'url' => $url
                ]);
            }
            return redirect('/home')->with('success', trans('lang.success_msg_created_event'));
        } else {
            return redirect('/home')->with('error', trans('lang.error_created_event'));
        }
    }

    public function show(Event $event)
    {
        $obj = new DateTimeZoneController();
        $date = $obj->getDateTimeZone();

        return view('events.show', compact('event', 'date'));
    }

    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
