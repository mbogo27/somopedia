<?php 
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $api_url = 'https://x8ki-letl-twmt.n7.xano.io/api:9G7I2u_g/topic/'.$id;
  $json_data = file_get_contents($api_url);
  $new_data=json_decode($json_data);
  $count=count($new_data->_quiz_of_topic);
  //display topics for subject
  $subject=$new_data->subject_id;
  $sub_url = 'https://x8ki-letl-twmt.n7.xano.io/api:9G7I2u_g/subject/'.$subject;
  $resp_data = file_get_contents($sub_url);
  $subject_data=json_decode($resp_data);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Somopedia - Learn with Flashcards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
</head>
  <body>
    <article class="bg-body-tertiary">
        <div class="container">
            <p class="text-center"><img src="assets\logo.png" width="20%"></p>
        <div class="row pb-3">
            <h3 class="text-center"><?php echo $new_data->unit_name;?></h3>
            <p  class="text-center">
            <?php echo $new_data->description;?>
            </p>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav flex-column sidebar">
                  <?php foreach($subject_data->_topics_of_subject as $topic){ ?>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href='topic.php?id=<?php echo $topic->id;?>'><?php echo $topic->unit_name;?></a>
                    </li>
                  <?php }  
                  ?>
                  </ul>
            </div>
            <div class="col-sm-8">
                <div class="row">
                <?php if($count>0){
                  foreach($new_data->_quiz_of_topic as $quiz){
                  ?>
                <div class="col-sm-6">

                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title fs-5 text">Question</h5>
                              <p class="card-text"><?php echo $quiz->question;?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                              <h5 class="card-title fs-5 text">Answer</h5>
                              <?php echo $quiz->answer;?></li>
                            </ul>
                          </div>
                    </div>
                <?php 
                  }
                }
                ?>
                </div>
            </div>
        </div>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>