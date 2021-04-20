<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\TicketRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class TicketService
{
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository) 
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function getAll()
    {
        return $this->ticketRepository->getAll();
    }

    public function save($data) 
    {
        $validator = Validator::make($data, [
            'titulo' => 'required',
            'descricao' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        return $this->ticketRepository->save($data);
    }

}