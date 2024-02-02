@extends('layouts2.app')

@section('title')
{{ __($module_name) }} {{ __($module_title) }}
@endsection

@section('content')
<h1 class="mt-4">{{ $module_title }}</h1>
@livewire('peserta')        
@endsection
