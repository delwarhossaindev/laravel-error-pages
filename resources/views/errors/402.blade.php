@extends('errors::illustrated-layout')

@section('code', '402')
@section('title', __('error-pages::auth.payment_required'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('403') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.payment_required_msg'))
