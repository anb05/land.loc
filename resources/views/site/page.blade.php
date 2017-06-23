@extends('layouts.site')
{{-- переопределяем секции для вывода --}}
@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content_page')
@endsection