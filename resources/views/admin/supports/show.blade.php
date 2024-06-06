@extends('template.layout')

@section('content')

    <div class="container">
        <h1 class="my-4">Detalhes: dúvida {{ $support->id }}</h1>
        <ul>
            <li>Assunto: {{ $support->subject }}</li>
            <li>Descrição: {{ $support->body }}</li>
            <li>Status: {{ $support->status }}</li>
        </ul>
        <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="buttons-footer d-flex gap-2">
                <a href="{{ route('supports.index') }}" class="btn btn-outline-secondary">Voltar</a>
                <button type="submit" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>

@endsection
