@extends('template.layout')

@section('content')

    <div class="container">

        <h1 class="m-0 py-4">Listagem de suportes</h1>

        <a href="{{ route('supports.create') }}" class="btn btn-success mb-4">Criar Dúvida</a>

        <div class="table">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <th>Assunto</th>
                    <th>Status</th>
                    <th>Descrição</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($supports->items() as $support)
                        <tr>
                            <td>{{ $support->subject }}</td>
                            <td>{{ getStatusSupport($support->status) }}</td>
                            <td>{{ $support->body }}</td>
                            <td>
                                <a href="{{ route('supports.show', $support->id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-pagination
            :paginator="$supports"
            :appends="$filters"
        />
    </div>

@endsection
