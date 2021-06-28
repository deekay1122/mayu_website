@extends('layouts.layout')
@section('title', "Mayu's Web")
@section('content')

<div class="flex-container">
    <div class="header-img">
        <img src="images/0.jpg" alt="">
    </div>
    <div class="m-o-s">
        <h1>mayu official site</h1>
        <div class="about">
            <p>Lorem ipsum.</p>
        </div>
        <div class="about">
            <p>02-02-21 dolor sit amet.</p>
        </div>
        <div class="about">
            <p>02-02-21 dolor sit amet.</p>
        </div>
        <div class="about">
            <p>02-02-21 dolor sit amet.</p>
        </div>
    </div>
</div>

<div class="container thing">
    <div id="thing">
</div>

<div class="row text-center">
    <div class="jumbotron jumbotron-fluid offset-3">
        <div class="container">
        </div>
    </div>
</div>

<div class="row">
    <div class="column">
        <h2>about mayu</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex, molestiae rem dolorem iure tenetur itaque!</p>
    </div>
    <div class="column">
        <h2>
            <ul class="social-icons icon-circle list-unstyled list-inline"> 
                <li><a href="#"><i class="fa fa-instagram"></i></a> </li> 
                <li><a href="#"><i class="fa fa-youtube-play"></i></a> </li> 
            </ul>
        </h2>
    </div>
    <div class="column">
        <h2>
            <div class="avatar">
                <img src="images/5.jpg" alt="Avatar" class="avatar">
            </div>
        </h2>
    </div>
</div>

<div class="center">
    <p>Lorem ipsum dolor sit amet.</p>
</div>

<!-- gallery -->
<div class="slider">
    <button id="prev" class="btn">
        <i class='fa fa-angle-left'></i>
    </button>
    <div class="card-content">
        <!-- Card -->
        <div class="card">
            <div class="card-img">
                <img src="images/5.jpg" alt="">
            </div>
            <div class="card-text">
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur. <p>
            </div>
        </div>
        <!-- Card End -->
      
        <!-- Card -->
        <div class="card">
            <div class="card-img">
                <img src="images/5.jpg" alt="">
            </div>
            <div class="card-text">
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur.<p>
            </div>
        </div>
        <!-- Card End -->
      
        <!-- Card -->
        <div class="card">
            <div class="card-img">
                <img src="images/5.jpg" alt="">
            </div>
            <div class="card-text">
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur.<p>
            </div>
        </div>
        <!-- Card End -->

        <!-- Card -->
        <div class="card">
            <div class="card-img">
                <img src="images/5.jpg" alt="">
            </div>
            <div class="card-text">
                <h2>Lorem ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur?<p>
            </div>
        </div>
        <!-- Card End -->
    </div>
    <button id="next" class="btn">
        <i class='fa fa-angle-right'></i>
    </button>
</div>
<!--  end of gallery  -->

<div class="center-2">
    <div class="play-button">
        <p>click the icon to view the sample video
            <a href="https://youtu.be/dd2QHlwGzzI">
                <i class="fa fa-play"></i>
            </a>
        </p>
    </div>
</div>

<div class="flex-container">
    <div class="socials">
        <ul class="social-icons icon-circle list-unstyled list-inline"> 
            <li><a href="#"><i class="fa fa-instagram"></i></a> </li> 
            <li><a href="#"><i class="fa fa-youtube-play"></i></a> </li> 
        </ul>
    </div>
</div>

<div class="center-3">
    <div class="footer">
        <footer> 
            <ul>
                <li><a href="#">mayu official site</a></li>
            </ul>
            <p>Lorem, ipsum dolor __ Lorem, ipsum</p>
            <small><p> 2021&copy;mayu</p></small>
        </footer> 
    </div>
</div>

<script src=js/script.js></script>

@endsection