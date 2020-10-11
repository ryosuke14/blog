@extends('layouts.base')

@section('title', 'おっくんの政治ブログトップページ')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <img src="img\logo.jpg">
          <small></small>

        <!-- Blog Post -->
        <div class="card mb-4">
        @foreach($boards as $board)
        <img class="card-img-top" src="{{ asset('storage/images/'. $board->photo) }}" alt="Card image cap" width="200px" height="350px">
          <div class="card-body">
            <h2 class="card-title">{{$board->title}}</h2>
            @if (mb_strlen($board->text) > 50)
            <p class="card-text">{{mb_substr($board->text,0 , 50). '・・・' }}</p>
            @else
            <p class="card-text">{{ $board->text }}</p>
            @endif
          <a href="blog/{{ $board->id }}" class="btn btn-primary">もっと読む &rarr;</a>
          </div>
          <div class="card-footer text-muted">
          投稿日：{{ $board->created_at }}
          </div>
        @endforeach
        </div>

        <!-- Pagination -->
        {{ $boards->links() }}

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">


        <!-- profile -->
        <div class = "testimonials text-center bg-light">
          <div class="my-4 ">       
            <div class="testimonial-item mx-auto mb-5 mb-lg-0  text-align:center ">
              <img class="img-fluid rounded-circle mb-3" src="img/EEX-GB2B_150×150.jpg" alt="">
              <h5>おっくんの政治チャンネル</h5>
              <p class="font-weight-light mb-0">このブログでは20代の3人が政治やニュースを</p>
              <p class="font-weight-light mb-0">できるだけわかりやすく考察しています</p>
            </div>
          </div>
        </div>


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
    <!-- /.row -->

  </div>
  <!-- /.container -->
  @endsection