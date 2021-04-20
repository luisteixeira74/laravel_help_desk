@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tickets</div>

                <div class="card-body">
                    @forelse ($tickets as $ticket)
                        <div class="row">
                            <div class="col-2">
                                Ticket
                            </div>
                            <div class="col-10">
                                <strong>{{$ticket->id}}</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Criado
                            </div>
                            <div class="col-10">
                                {{$ticket->created_at}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Título
                            </div>
                            <div class="col-10">
                                {{$ticket->titulo}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Descricão
                            </div>
                            <div class="col-10">
                                {{$ticket->descricao}}
                            </div>
                        </div>
                        <div class="row text-right pt-4">
                            <div class="col-2">
                                <a href="{{ route('ticket.edit', ['id' => $ticket->id]) }}" type="button" class="btn btn-primary">
                                    Editar
                                </a>
                            </div>
                            <div class="col-10">
                                <a href="{{ route('ticket.destroy', ['id' => $ticket->id]) }}" type="button" class="btn btn-danger">
                                    Deletar
                                </a>
                            </div>
                        </div>
                        <hr />
                    @empty
                        <p>Não existem tickets</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
