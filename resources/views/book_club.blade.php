@extends('layouts.layout')
@section('title', 'Book Club')
@section('content')
<!-- Added header and class header -->
<header>
  <div class="header" style="padding:85px">
<div class="message">
          </div>
  <div class="main_container">
        <div class="book_club_title">
          <h1>Mayu ブッククラブ</h1>
      </div>
       <div class="book_club_about">
         <h2>  〜Mayu ブッククラブとは？〜 </h2>
         <br>
</div>
<div class="book_club_desc">
  Mayuがおすすめする本を課題図書として、月に２回メンバーと一緒に話し合いながら感想を共有する有料クラブです。<br>
  <br>
  普段本を読むことを習慣にしていても、気軽にアウトプットしたり交流したりする場所が少ないと思い、このブッククラブを立ち上げました。<br>
  <br>
  同じ本でも、読む人の経験や知識、感性によって解釈はさまざまです。ブッククラブメンバーの感想を聞くことで、あらたな視点を発見できます。<br>
  <br>
</div>
</div>
</div>
</div>
</header>
<!-- End of header -->

<!-- Added section and content class -->
<section class="section">
  <div class="content">
    <div class="info">
      <div class="book_club_audiences">
        <h2> Mayuブッククラブは、こんな方におすすめです。</h2>
      <p>
        <ul>
          <li><small>
            Mayuが普段読んでいる本を読んでみたい.</li>
          <li>アウトプットをしながら内容の理解を深めたい.</li>
          <li>読書好きな人たちと交流したい.</li></small>
        </ul>
      </p>
      <a href="#" class="info-btn">More Info</a>
    </div>
  </div>
</section>
<!-- End of section and content div -->

<!-- Added page and section class -->
  <div class="page">
      <div class="section">
        <img src="images/book3.jpeg" alt="image-2" style="width:100%">
        <div class="book_club_message">
          <p>
          ぜひブッククラブでお会いしましょう。
        </p>
        </div>
        <div class="book_club_dates">
          <p>
          【日時】<br>
          月に2回、毎週土曜の14時〜16時 <br>
          対面の場合は、都内に来れる方 <br>
        </p>
        </div>
      </div>
      <div class="section">
        <img src="images/book2.jpeg" alt="image-2" style="width:100%">
        <div class="book_club_details">
          <p>
          【内容】<br>
      前半の1時間：課題図書の説明と感想のシェア <br>
      後半の1時間：Mayuやブッククラブメンバーが他に読んでる本、ジャンルについてシェア <br>
    </p>
        </div>
      </div>
      <div class="section">
        <img src="images/book4.jpeg" alt="image-2" style="width:100%">
        <div class="book_club_rates">
          <p>
          【料金】<br>
          対面：毎月1万円 × 3ヶ月継続 <br>
      　　  ※限定20名 <br>
          ZOOM：月3,000円　出入り自由 <br>
      　　　人数制限なし <br>
          <div class="dashboard">
            <a href="dashboard">お申し込みはダッシュボードにログイン</a>
          </div>
          </p>

    </div>
  </div>
</div>

<!-- end of page and section -->
@include('includes.footer')
@endsection