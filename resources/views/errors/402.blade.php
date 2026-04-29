@extends('errors::illustrated-layout')

@section('code', '402')
@section('title', __('auth.payment_required'))

@section('image')
<div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('auth.payment_required_msg'))
