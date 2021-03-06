<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVID-19 Tracker | Advice</title>
  
<head>
  <meta charset="utf-8">
  <?php include( 'parts/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
    
<body>

<?php include( 'parts/navbar.php'); ?>

<style>
.jumbotron {
  background-image: url(https://atlasbiomed.com/blog/content/images/size/w2000/2020/03/2020-03-19-Coronavirus-transmission.png);
  background-repeat: no-repeat;
  background-size: cover;
  }
.jumbotron h1 {
  color: white;
  text-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
}
.jumbotron h5 {
  color: white;
  text-shadow: 0px 0px 10px rgba(0, 0, 0, 1);
}
</style>

<?php

// Pull latest from NHS API
$nhsAdvise = "https://api.nhs.uk/conditions/coronavirus-covid-19?url=covid-19.uk.com&modules=false";
$jsonNhsAdvise = json_decode(file_get_contents($nhsAdvise), true);

$description = $jsonNhsAdvise["description"];
$jsonNhsAdvise = str_replace("_", " ", $jsonNhsAdvise);

?>

<!-- Jumbotron Header -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <h1 class="display-4">NHS Advice</h1>
      <h5><i class="fab fa-github" aria-hidden="true"></i> <a style="color: #fff" href="https://github.com/Slethen/covid19-info"><b><u>Open Source</u></b></a> COVID-19 Data Tracker focused on providing accurate and up to date information that's easy to understand in a clean layout.</h5>
  </div>
</div>

<div class="container">

<h3>Overview</h3>

<p><?php echo $description; ?></p>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Do</h4>
  <b>
    <p><i class="fa fa-check"></i> wash your hands with soap and water often – do this for at least 20 seconds</p>
    <p><i class="fa fa-check"></i> use hand sanitiser gel if soap and water are not available</p>
    <p><i class="fa fa-check"></i> cover your mouth and nose with a tissue or your sleeve (not your hands) when you cough or sneeze</p>
    <p><i class="fa fa-check"></i> put used tissues in the bin immediately and wash your hands afterwards</p>
    <p><i class="fa fa-check"></i> stay 2 metres (3 steps) away from other people, if you need to go outside</p>
    <p><i class="fa fa-check"></i> cover your nose and mouth when it's hard to stay away from people</p>
    </b>
</div>

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Don't</h4>
  <b>
      <p><i class="fa fa-times"></i> do not touch your eyes, nose or mouth if your hands are not clean</p>
  </b>
</div>

<!-- NHS API Section 1 -->
<?php
  $hasPartCount = count($jsonNhsAdvise["hasPart"]);
  $var = 0;

  foreach(range(0,--$hasPartCount) as $index) {

    ++$var;

    // Replace "_" in Titles with spaces
    $title = $jsonNhsAdvise["hasPart"][$var]["name"];
    $title = str_replace("_", " ", $title);

    // If "name" object is empty don't echo title
    if ($jsonNhsAdvise["hasPart"][$var]["name"] != "") {
      echo '<h3>' . ucfirst($title) .'<a href="' . $jsonNhsAdvise["hasPart"][$var]["url"] .'"> <i class="fa fa-link text-muted small"></i></a></h3>';
    }

    // If "text" object is empty echo "description" object
    if ($jsonNhsAdvise["hasPart"][$var]["text"] == "") {
      echo '<p>' . $jsonNhsAdvise["hasPart"][$var]["description"] .'</p>';
    }
    else {
      echo '<p>' . $jsonNhsAdvise["hasPart"][$var]["text"] .'</p>';
    }
  }
?>

<!-- NHS API Section 2 -->
<h3>Guides</h3>
<?php
  $mainEntityCount = count($jsonNhsAdvise["mainEntityOfPage"]["0"]["mainEntityOfPage"]);;
  $var = -1;

  foreach(range(0,--$mainEntityCount) as $index) {

  ++$var;

  echo '
  <h5>' . $jsonNhsAdvise["mainEntityOfPage"]["0"]["mainEntityOfPage"][$var]["headline"] .'</h5>
  <p><a href="https://www.nhs.uk' . $jsonNhsAdvise["mainEntityOfPage"]["0"]["mainEntityOfPage"][$var]["url"] .'">' . ucfirst($jsonNhsAdvise["mainEntityOfPage"]["0"]["mainEntityOfPage"][$var]["text"]) .'</a></p>
  
  ';
  }

?>

<!-- 111 Service Section -->
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"><b>Urgent advice: Use the NHS 111 online coronavirus service if: </b></h4>
  <ul>
    <li>you feel you cannot cope with your symptoms at home</li>
    <li>your condition gets worse</li>
    <li>your symptoms do not get better after 7 days</li>
  </ul> 
  <h5><a href="https://111.nhs.uk/covid-19/">Use the 111 coronavirus service</a></h5>
  <p><b>Only call 111 if you cannot get help online.</b></p>
</div>

</div>

<?php include( 'parts/footer.php'); ?>

</body>
</html>