@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('error-pages::auth.service_unavailable'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('503') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', $exception->getMessage() ?: __('error-pages::auth.service_unavailable_msg'))
