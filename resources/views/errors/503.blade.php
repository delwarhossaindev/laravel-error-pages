@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('auth.service_unavailable'))

@section('image')
<div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', $exception->getMessage() ?: __('auth.service_unavailable_msg'))
