@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('error-pages::auth.page_not_found'))

@section('image')
<div style="background-image: url('{{ \Delwarhossaindev\ErrorPages\Illustration::url('404') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('error-pages::auth.page_not_found_msg'))
