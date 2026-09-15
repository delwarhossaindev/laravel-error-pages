@extends('errors::illustrated-layout')

@section('code', '429')
@section('title', __('error-pages::auth.too_many_requests'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('403') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.too_many_requests_msg'))
