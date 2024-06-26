@extends('template.layout')

@section('content')

    <header class="container d-flex flex-column">

        <div class="d-flex justify-content-between my-4 align-center" style="width: 100%">
            <h5 class="m-0 py-1">Fórum <span class="badge rounded-pill bg-dark">{{ $supports->total() }} dúvidas</span> </h5>

            <a href="{{ route('supports.create') }}" class="btn btn-dark m-0 d-flex justify-content-between align-items-center gap-2"> <i class="fa-solid fa-circle-plus"></i> <p class="m-0">Criar Dúvida</p></a>
        </div>

        <div class="search mb-4 d-flex align-items-center gap-2 bg-dark">
            <i class="fa-solid fa-magnifying-glass"></i>
            <form action="" method="GET">
                <input type="text" placeholder="Procurar" name="filter" value="{{ $filters['filter'] ?? '' }}">
            </form>
        </div>

    </header>


    <main class="container">

        <x-messages/>

        <div class="table">
            <table class="table rounded-3 overflow-hidden align-middle table-dark">
                <thead>
                    <th>Assunto</th>
                    <th>Status</th>
                    <th>Descrição</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($supports->items() as $support)
                        <tr>
                            <td>{{ $support->subject }}</td>
                            <td>
                                <x-status-support
                                    :status="$support->status"
                                />
                            </td>
                            <td>{{ $support->body }}</td>
                            <td class="text-end">
                                <a href="{{ route('supports.show', $support->id) }}" class="btn btn-secondary btn-sm">Ver</a>
                                <a href="{{ route('supports.edit', $support->id) }}" class="btn btn-warning btn-sm">Editar</a>
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
    </main>

@endsection
