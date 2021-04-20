<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketService;
use Exception;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * @var ticketService
     */
    protected $ticketService;

     /**
     * TicketController Constructor
     *
     * @param TicketService $service
     *
     */
    public function __construct(TicketService $service)
    {
        $this->ticketService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->ticketService->getAll();
        
        return view('ticket.index', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'titulo',
            'descricao',
        ]);

        $data['user_id'] = Auth::id();

        $ticket = $this->ticketService->save($data);

        return redirect()->route('ticket.index')->with('message', $ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $ticket = $this->ticketService->getById($id);

        return view('ticket.edit', ['ticket' => $ticket, 'isDelete' => $request->has('isDelete')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $this->ticketService->update($request, $id);

        return redirect()->route('ticket.index')->with('success', 'Ticket atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('aqui');
        return $this->ticketService->delete($id);
    }
}
