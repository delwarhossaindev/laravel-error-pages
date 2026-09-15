@extends('errors::illustrated-layout')

@section('code', '403')
@section('title', __('error-pages::auth.forbidden'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('403') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', $exception->getMessage() ?: __('error-pages::auth.forbidden_message'))
