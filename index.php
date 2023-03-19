
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>internship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
           
                <?php
           $json = file_get_contents('data1.json');
           $data = json_decode($json, true);
           
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $rating = $_POST['rating'];
           
             if ($rating == 'all') {
               $filteredData = $data;
             } else {
               $filteredData = array_filter($data, function($item) use ($rating) {
                 return $item['rating'] == $rating;
               });
             }
           }
           
           ?>
           
           <form method="post">
            <label>Search by rating:</label>
             <select name="rating">
               <option value="all">All</option>
               <option value="5">5</option>
               <option value="4">4</option>
               <option value="3">3</option>
               <option value="2">2</option>
               <option value="1">1</option>
             </select>
             <input type="submit" value="Filter">
           </form><?php
            foreach ($filteredData as $item) {
           ?>
           <div class="card">
         <?php  echo '<p>Rating:</p>' .  $item['rating']. '<br>'; ?>
         <?php  echo '<p>Id:</p>' . $item['id'] . '<br>'; ?>
         <?php  echo '<p>review Created On:</p>' . $item['reviewCreatedOn'] . '<br>'; ?>
            </div>
            <?php
            }?>
               
            </div>
           
            </div>
        </div>
    </div>
   
    
</body>
</html>
