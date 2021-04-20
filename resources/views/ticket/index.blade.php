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