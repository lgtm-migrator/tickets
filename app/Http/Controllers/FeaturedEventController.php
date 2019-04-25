<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FeaturedEventController extends Controller
{
    /**
     * Return the featured events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::featured()->get();

        return view('events.featured')
            ->with([
                'events' => $events,
            ]);
    }
}