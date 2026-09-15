@extends('errors::illustrated-layout')

@section('code', '500')
@section('title', __('error-pages::auth.server_error'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('500') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.server_error_msg'))
