@extends('admin.sesau.samu.layouts.app')

@section('content')
    <livewire:admin.sesau.samu.adicionar-tipo-component  key="{{ Str::random(5) }}" />
@endsection
