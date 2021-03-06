@extends('layouts.base')

@section('title', 'ブログ詳細')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
      <h1 class="mt-4">{{ $boards->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $boards->user_id }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{ $boards->created_at }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="card-img-top" src="{{ asset('storage/images/'. $boards->photo) }}" alt="Card image cap" width="200px" height="350px">


        <hr>

        <!-- Post Content -->
        <p>{{ $boards->text }}</p>

        <hr>




        <!-- Comments Form -->

        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            @csrf
            <form action="comment/{{ $boards->id }}" method ="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                <label for="name">ニックネーム</label>
                <input id="comment_name" name="comment_name" placeholder="ニックネーム" rows="2"></textarea>
                

              </div>
              <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" name="comment_text" placeholder="コメント" rows="5"></textarea>
              </div>
                    <button type="submit" class="btn btn-primary" >
                        {{ __('投稿する') }}
                    </button>
                </form>            </div>
        </div>


        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>



        
    </div>

  </div>

  <!-- Sidebar Widgets Column -->
  <div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-append">
            <button class="btn btn-secondary" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  