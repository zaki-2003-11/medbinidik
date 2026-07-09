@extends('admin.layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">

        Edit Specialty

    </h1>

    <x-admin.alert />

    <form action="{{ route('specialties.update', $specialty) }}" method="POST">

        @csrf

        @method('PUT')

        @include('admin.specialties._form')

    </form>
@endsection
