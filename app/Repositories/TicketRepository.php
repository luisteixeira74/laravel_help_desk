<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketRepository 
{
    public function save($data)
    {
        $ticket = new Ticket;
        $ticket->titulo = $data['titulo'];
        $ticket->descricao = $data['descricao'];
        $ticket->user_id = $data['user_id'];

        $ticket->save();

        return $ticket->fresh();
    }

    public function getAll()
    {
        return Ticket::orderBy('created_at', 'desc')->paginate(10);
    }
}
