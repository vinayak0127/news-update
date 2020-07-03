<html>
<head>
  <title>news updates</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="newsstyle.css">
  <?php  include 'links.php'; ?>
   <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500;600;700&display=swap" rel="stylesheet">

    
            
</head>
<body>

  
<div class="container">
    <div class="row">
      <div class="col text-center">
          <h1>
      <img src="Capture.jpg" width="200" height="100">
        </h1>
      </div>
  </div>
</div>

<p class="text-center">NEWS update is powered by<a href="https://newsapi.org/">Newsapi.org</a></p>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container">
  <h1 class="title text-center"></h1>
  <hr>
  <div class="list-wrapper">
    <?php
      if(file_exists('news.json')){
        $api_url = 'news.json';
        $newslist = json_decode(file_get_contents($api_url));
      }else{
        $news_keyword = 'politics'; //we will be fetching only sports related news
        $api_url = 'http://newsapi.org/v2/top-headlines?country=in&category=health&apiKey=03929028cb1246efadd304395e1db46b';
        $newslist = file_get_contents($api_url);
        file_put_contents('news.json', $newslist);
        $newslist = json_decode($newslist);
      }
      foreach($newslist->articles as $news){?>
      <div class="row single-news">
        <div class="col-4">
          <img style="width:100%;" src="<?php echo $news->urlToImage;?>">
        </div>
        <div class="col-8">
          <h2><?php echo $news->title;?></h2>
          <small><?php echo $news->source->name;?></small>
          <?php if($news->author && $news->author!=''){ ?>
            <small>| <?php echo $news->author;?></small>
          <?php } ?>
          <p><?php echo $news->description;?></p>
          <a href="<?php echo $news->url;?>" class="btn btn-sm btn-primary" style="float:right;" target="_blank">Read More >></a>
        </div>
      </div>
      <hr>
    <?php } ?>
  </div>
</div>  



  
<!-- /////////////////// footer ////////////// -->

<!-- Footer -->
<footer class="page-footer font-small  ">
  <div class="footer-copyright text-center py-3">© 2020 Copyright:</div>
  <p class="text-center"> developed and designed by vinayak raj</p>
</footer>
</body>
<script type="text/javascript" src="newsapi.js"></script>
</html>
