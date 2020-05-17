@extends('layouts.app')

@section('content')
<div class="home-page" id="homePage">
  <div class="container">
    <div class="center-caption">
      <h2 class="display-4">Win more work with Exams</h2>
      <p class="lead">Prove your skills. Pass our Exams. Win more work.</p>
      <a type="button" class="call-to-action-btn">Find an Exam</a>
    </div>
  </div>
</div>
<div class="job-categories">
  <div class="container">
    <h2 class="text-center">Browse top categories</h2>  
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <ul class="job-list">
          <li><a href="#">Php</a></li>
          <li><a href="#">Graphic Design</a></li>
          <li><a href="#">Html</a></li>
          <li><a href="#">Logo Design</a></li>
          <li><a href="#">Photoshop</a></li>
          <li><a href="#">wordPress</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <ul class="job-list">
          <li><a href="#">Php</a></li>
          <li><a href="#">Graphic Design</a></li>
          <li><a href="#">Html</a></li>
          <li><a href="#">Logo Design</a></li>
          <li><a href="#">Photoshop</a></li>
          <li><a href="#">wordPress</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </div>

       <div class="col-md-3 col-sm-6">
        <ul class="job-list">
          <li><a href="#">Php</a></li>
          <li><a href="#">Graphic Design</a></li>
          <li><a href="#">Html</a></li>
          <li><a href="#">Logo Design</a></li>
          <li><a href="#">Photoshop</a></li>
          <li><a href="#">wordPress</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <ul class="job-list">
          <li><a href="#">Php</a></li>
          <li><a href="#">Graphic Design</a></li>
          <li><a href="#">Html</a></li>
          <li><a href="#">Logo Design</a></li>
          <li><a href="#">Photoshop</a></li>
          <li><a href="#">wordPress</a></li>
          <li><a href="#">Article</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection

@push('css')
<style>
  #homePage{
    height:100vh;
    background-image:url('img/image1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    padding:0;
    margin:0;
    display:flex;
    justify-content: center;
    align-content: center;
    flex-direction: column;
  }
  .center-caption{
   color:white;
   font-weight:bold;
  }
  .call-to-action-btn{
    padding:10px 14px;
    background-color:#0E97EF;
    letter-spacing: .15rem;
    font-size:1/5rem;
  }
  
  .job-categories{
    padding:2rem 0;
    margin:0;
  }
  .job-list{
    list-style:none;
    padding:2rem 0;
  }
  .job-list li a{
    font-size:1.2rem;
    text-transform: capitalize;
    color:black;
    font-weight: 300;
  }
  
  
  
  </style>
@endpush