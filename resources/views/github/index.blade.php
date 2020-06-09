@extends('layouts.app')

@section('content')
<div class="my-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#">Github finder</a>
    <a href="{{url()->previous()}}" class="ml-auto text-white">Go back</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="container py-2">
    <div class="search-container">
      <h1>Search Github Users</h1>
      <p class="lead">Enter a username to fetch a users profile info and repo</p>
      <input type="text" class="form-control" id="searchUser" placeholder="github username" autofocus="true">
    </div>

    {{-- profile of searched user --}}
    <div id="profile"></div>
  

  </div>
</div>
@endsection


@push('js')
<script>
  $(document).ready(function(){
    $('#searchUser').on('keyup',function(e){
     let username = e.target.value;
     if(username === '') return
     //make request to ajax
     $.ajax({
       url:'http://api.github.com/users/'+ username,
       data:{
         client_id:'b805a5bc80184e8cdf47',
         client_secret:'d025dc6da9394d0b94c0bd90438e206c9c15b092'
       },

     })
     .done(function(user){
      //dom of profile
    
      $('#profile').html(`
      <div class="container my-4">
        <div class="row">
          <div class="col-md-3">
            <img class="img-thumbnail img-fluid" src="${user.avatar_url}" alt="">
            <a href="${user.html_url}" target="_blank" class="btn btn-danger btn-block">View Profile</a>
          </div>
          <div class="col-md-9">
            <span class="badge badge-dark">Public Repos: ${user.public_repos}</span>
            <span class="badge badge-primary">Public dists: ${user.public_gists}</span>
            <span class="badge badge-secondary">followers: ${user.followers}</span>
            <span class="badge badge-info">following: ${user.public_repos}</span>
            <br><br>
            <ul class="list-group">
              <li class="list-group-item">
                Company: ${user.company}
              </li>
              <li class="list-group-item">
                website/blog: ${user.blog}
              </li>
              <li class="list-group-item">
                Company: ${user.company}
              </li>
              <li class="list-group-item">
                location: ${user.location}
              </li>
              <li class="list-group-item">
                member since: ${user.created_at}
              </li>
            </ul>
          </div>
        </div>
        <h3 class="page-header">Latest Repos</h3>
        <div id="repos"></div>
      </div>
      `);


      //  loading the repos
      $.ajax({
        url:'http://api.github.com/users/' + username +'/repos',
        data:{
         client_id:'b805a5bc80184e8cdf47',
         client_secret:'d025dc6da9394d0b94c0bd90438e206c9c15b092',
         sort:'created: asc',
         per_page:5
       },
      }).done(function(repos){
        $.each(repos,function(index,repo){
          $('#repos').append(`
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <strong>${repo.name}</strong>: ${repo.description}
                  </div>  
                  <div class="col-md-3">
                    <span class="badge badge-dark">forks: ${repo.forks_count}</span>
                    <span class="badge badge-primary">watchers: ${repo.watchers_count}</span>
                    <span class="badge badge-secondary">stargazers: ${repo.stargazers_count}</span>
                  </div>
                  <div class="col-md-2">
                    <a href="${repo.html_url}" target="_blank" class="btn btn-danger">Repo link</a>
                  </div>
                </div>
              </div>
            </div>
          `)
        })
      });
      
      
     });
    });
  });
</script>



@endpush

@push('css')
@endpush