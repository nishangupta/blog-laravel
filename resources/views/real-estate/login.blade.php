@extends('layouts.login')

@section('content')
<main>
  <div class="login-container">
    <div class="user-login">
      <h1 class="text-center"><a href="{{route('property.index')}}" class="login-brand">NepEstate</a></h1>
      <h4 class="my-2">Sign in or Register to save your favourite homes</h4>
      <form action="">
        <div class="form-group mt-4 mb-2">
          <!-- <label for="loginEmail">Email</label> -->
          <input type="text" placeholder="Enter email address" class="modal-email form-control">
          <p class="d-none text-warning"><i class="fas fa-excamation-circle"></i> Please enter email address</p>
        </div>
        <button type="submit" class="btn btn-block primary-btn">Submit</button>
      </form>
      <hr>
      <div>Or</div>
      <hr>
      <button class="btn btn-block btn-primary"><i class="fab fa-facebook"></i> Continue with
        Facebook</button>
      <button class="btn btn-block btn-light"><i class="fab fa-google"></i> Continue with Google</button>
      <p class="terms-conditions mt-2">I accept Nepestate's <a href="#" class="primary-link">Terms of use</a> and <a
          href="#" class="primary-link">Privacy Policy.</a></p>
      <hr>
      <div class="login-footer">
        <div class="container text-center">
          <p class="">Are you a Real Estate Professional? <a href="#" class="text-light">Register Here</a></p>
        </div>
      </div>
    </div>
    <!--user-login-->
  </div>
  <!--Login container-->
</main>
@endsection


@push('js')
@endpush


@push('css')
<style>
</style>
@endpush

