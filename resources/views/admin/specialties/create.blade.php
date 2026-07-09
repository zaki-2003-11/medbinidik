@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">

        Add Specialty

    </h1>

    <x-admin.alert />

    <form action="{{ route('specialties.store') }}" method="POST">

        @include('admin.specialties._form')

    </form>
@endsection
