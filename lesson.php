<?php 
if(isset($_GET)){
    $id=$_GET['id'];
    
    
$api_url = 'https://x8ki-letl-twmt.n7.xano.io/api:9G7I2u_g/subject/'.$id;
$json_data = file_get_contents($api_url);
$new_data=json_decode($json_data);
//$new_data=$new_data->getProperties();
$count=count($new_data->_topics_of_subject);

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
            <h3 class="text-center"><?php echo $new_data->title;?></h3>
            <p  class="text-center">
               <?php echo $new_data->description; ?>
            </p>
        </div>
        <div class="row p-2">
           <h4 class="text-center pb-4">Topics in this Subject</h4>
           <?php 
           if($count>0){
           foreach($new_data->_topics_of_subject as $topic){?> 
           <div class="card card-custom">
                <div class="card-body">
                <h5><?php echo $topic->unit_name;?></h5>
                <p><?php echo $topic->description;?></p>
                <a href="#" class="card-link btn btn-primary">Notes</a>
                <a href="#" class="card-link btn btn-primary">Quiz</a>
                </div>
            </div>
            <?php 
            }
          }
            ?> 
        </div>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>