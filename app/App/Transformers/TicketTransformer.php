<?php

namespace App\Transformers;

use App\Models\Ticket;
use League\Fractal\TransformerAbstract;

class TicketTransformer extends TransformerAbstract
{
    public function transform(Ticket $ticket)
    {
        return [
            'id'                      => $ticket->id,
            'name'                    => $ticket->name,
            'price'                   => $ticket->price,
            'price_pretty'            => money($ticket->price, 'EUR'),
            'vat'                     => $ticket->vat,
            'maxAmountPerTransaction' => $ticket->maxAmountPerTransaction,
            'event_id'                => $ticket->event_id,
        ];
    }
}