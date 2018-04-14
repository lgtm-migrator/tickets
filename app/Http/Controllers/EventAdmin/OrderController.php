<?php

namespace App\Http\Controllers\EventAdmin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the event customers.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewEventOrders()
    {
        // do ugly hard code for event ID
        $event = Event::findOrFail(1);

        // restrict access to authorized users only
        $this->authorize('update', $event);

        return view('events.admin.orders')
            ->with([
                "event" => $event,
                "orders" => $event->orders()->paginate(15),
            ]);
    }

}
