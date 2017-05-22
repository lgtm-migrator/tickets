@extends('layouts.event-admin')

@section('admin.content')
    <h1 id="adminTitle">{{ __('event.admin.pages.tickets.list.title') }}</h1>
    <p><a href="{{ route('events.admin.tickets.new') }}" class="btn btn-primary">{{ __('event.admin.pages.tickets.list.create-ticket') }}</a></p>
    @if(count($tickets) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Price</td>
                        <td>VAT</td>
                        <td>Amount of tickets reserved</td>
                        <td>Max. transaction amount?</td>
                        <td>Is seatable?</td>
                        <td>Is sleepable?</td>
                        <td>Available at</td>
                        <td>Unavailable at</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->price }}</td>
                            <td>{{ $ticket->vat }}</td>
                            <td>{{ $ticket->reserved }}</td>
                            <td>{{ $ticket->maxAmountPerTransaction }}</td>
                            <td>{{ ($ticket->is_seatable == 1) ? "True" : "False"  }}</td>
                            <td>{{ ($ticket->is_sleepable ==1) ? "True" : "False" }}</td>
                            <td>{{ $ticket->availableAt }}</td>
                            <td>{{ $ticket->unavailableAt }}</td>
                            <td><a href="{{ route('events.admin.tickets.edit', ['id' => $ticket->id ]) }}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @else
        <p>{{ __('event.admin.pages.tickets.list.no-tickets') }}</p>
    @endif



@endsection