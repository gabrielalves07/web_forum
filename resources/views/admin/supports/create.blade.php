@extends('template.layout')

@section('content')
    <div class="container">
        <h1 class="my-4">Nova Dúvida</h1>

        <x-alert/>

        <form action="{{ route('supports.store') }}" method="POST">
            @include('admin.supports.partials.form')
        </form>

    </div>
@endsection
