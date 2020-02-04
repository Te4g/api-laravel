<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Resources\Ticket as TicketResource;

class TicketController extends Controller
{
    /**
     * @return TicketResource
     */
    public function index()
    {
        return new TicketResource(Ticket::all());
    }

    /**
     * @param Ticket $ticket
     * @return TicketResource
     */
    public function show(Ticket $ticket):TicketResource
    {
        return new TicketResource($ticket);
    }

    /**
     * @param Request $request
     * @return TicketResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'message' => 'required'
        ]);

        $ticket = Ticket::create($request->all());

        return new TicketResource($ticket);
    }

    /**
     * @param Ticket $ticket
     * @param Request $request
     * @return TicketResource
     */
    public function update(Ticket $ticket, Request $request):TicketResource
    {
        $ticket->update($request->all());

        return new TicketResource($ticket);
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
    }
}
