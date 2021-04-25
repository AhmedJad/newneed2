@extends('layouts.app')

@section('content')
    {{$dataTable->table()}}
@endsection

@push('scripts_lib')
@include('layouts.datatables_js')
    {{$dataTable->scripts()}}
@endpush