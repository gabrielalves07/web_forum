@extends('template.layout')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Dúvida {{ $support->id }}</h1>

        <x-alert/>

        <form action="{{ route('supports.update', $support->id) }}" method="POST">
            @method('PUT')
            @include('admin.supports.partials.form', [
                'support' => $support
            ])
        </form>
    </div>
@endsection

