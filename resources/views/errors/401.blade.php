@extends('errors::illustrated-layout')

@section('code', '401')
@section('title', __('error-pages::auth.unauthorized'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('403') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.unauthorized_msg'))
