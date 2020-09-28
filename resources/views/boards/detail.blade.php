@extends('layouts.base')

@section('title', 'ブログ詳細')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $board->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{ $board->created_at }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <div>{{ $user->name }}</div>

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>              
            <div class="form-group">
                <label for="name">ニックネーム</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="ニックネーム">
            </div>

              <div class="form-group">
                <label for="comment">コメント</label>
                <textarea class="form-control" placeholder="コメント" rows="3"></textarea>
              </div>
              <a href="{{ route('comment') }}" class="btn btn-primary">送信 &rarr;</a>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        <div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0">{{ message->name }}</h5>
            {{ message->text }}
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
  