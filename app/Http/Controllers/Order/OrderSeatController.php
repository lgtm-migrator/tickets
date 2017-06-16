<?php

namespace Tikematic\Http\Controllers\Order;

use Tikematic\Models\{Event, Seat, Order, OrderItem};
use Illuminate\Http\Request;
use Tikematic\Http\Requests\OrderSeatRequest;
use Tikematic\Http\Controllers\Controller;

class OrderSeatController extends Controller
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
    public function addSeatToOrderItems( OrderSeatRequest $request, $order)
    {
        foreach($request->seat as $order_item_id=>$seat_id) {
            // find seat and mark as taken
            $seat = Seat::find($seat_id);
            $seat->status = "taken";
            $seat->save();

            // attach the seat to the orderItem
            $orderItem = OrderItem::find($order_item_id);
            $orderItem->seat()->associate($seat);
            $orderItem->save();
        }

        return redirect()
            ->route('settings.orders.specific', [
                "order" => $order,
            ]);

    }

}
