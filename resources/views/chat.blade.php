@extends('layouts.app')

@section('content')
<div class="container">
  <div class="my-5">
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            {{_('We code Messenger')}}
          </div>
          <div class="card-body" id="#app">
          <chat-app :user="{{ auth()->user() }}"></chat-app>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
<style>
</style>
@endpush