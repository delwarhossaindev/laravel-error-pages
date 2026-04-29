@extends('errors.layout')

@section('code', '500')
@section('title', 'Server Error')
@section('message', $exception->getMessage() ?: 'Whoops, something went wrong on our servers.')
