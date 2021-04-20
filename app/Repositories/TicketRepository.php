<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketRepository 
{
    /**
     * Save Ticket
     *
     * @param $data
     * @return Ticket
     */
    public function save($data)
    {
        $ticket = new Ticket;
        $ticket->titulo = $data['titulo'];
        $ticket->descricao = $data['descricao'];
        $ticket->user_id = $data['user_id'];

        $ticket->save();

        return $ticket->fresh();
    }

    /**
     * Get All Tickets
     *
     * @return Ticket
     */
    public function getAll()
    {
        return Ticket::orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Get Ticket by Id
     *
     * @param $id
     * @return Ticket
     */
    public function getById($id)
    {
        return Ticket::findOrFail($id);
    }


    /**
     * Update Ticket
     *
     * @param $data
     * @param $id
     * @return Ticket
     */
    public function update($data, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->titulo = $data['titulo'];
        $ticket->descricao = $data['descricao'];
    }

    /**
     * Delete Ticket
     *
     * @param $data
     * @return Ticket
     */
    public function delete($id)
    {
        
        $ticket = Ticket::find($id);
        $ticket->delete();

        return $ticket;
    }
}

