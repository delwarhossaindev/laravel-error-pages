@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('error-pages::auth.page_expired'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('403') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.page_expired_msg'))
