<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Somopedia - Learn with Flashcards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
  <body>
  <?php

$api_url = 'https://x8ki-letl-twmt.n7.xano.io/api:9G7I2u_g/subject';

// Read JSON file
$json_data = file_get_contents($api_url);
$new_data=json_decode($json_data);
?>
    <article class="bg-body-tertiary">
        <div class="container">
            <p class="text-center"><img src="assets\logo.png" width="20%"></p>
            <h1 class="text-center">Notecards for Grade 4 CBC Learners</h1>
            <p class="text-center">Adaptive flashcards to help you learn and master all subjects</p>
            <div class="row pt-3">
              <?php foreach($new_data as $subject){ ?>
                <div class="col-sm-3">
                    <div class="card mb-4">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $subject->title;?></h5>
                          <p class="card-text"><?php echo $subject->description;?></p>
                          <a href='subject.php?id=<?php echo $subject->id;?>' class="btn btn-custom">Check Notecards</a>
                        </div>
                      </div>
                </div>
                <?php } ?>
            </div>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h3 class="text-center">About Somopedia</h3>
                    <p class="text-center">
                        Somopedia provides notes and test prep on various subjects for CBC students. 
                        Are you ready to learn and master all concepts on your CBC curriculum? Don't forget to check out
                        these quiz flascards so that you can be ready for exams. 
                    </p>
                </div>
            </div>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>