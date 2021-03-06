<?php
$test = '1';
$xml = simplexml_load_file('source.xml');
if (isset($_GET['1'])) {
   $test = '1';
}
if (isset($_GET['2'])) {
   $test = '2';
}
if (isset($_GET['3'])) {
   $test = '3';
}
if (isset($_GET['4'])) {
   $test = '4';
}
$result = $xml->xpath("/website/page[@id=$test]");
$firstPage = $xml->xpath("/website/page[@id='1']");
$secondPage = $xml->xpath("/website/page[@id='2']");
$thirdPage = $xml->xpath("/website/page[@id='3']");
$fourthPage = $xml->xpath("/website/page[@id='4']");

$patternName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$patternMail = '#^([a-zA-Z0-9À-ÖØ-öø-ÿ\.\-\_]+)@([a-zA-Z0-9À-ÖØ-öø-ÿ\-\_\.]+)\.([a-zA-Z\.]{2,250})$#';
$patternPhone = '#^([0][1-79]){1}([.][0-9]{2}){4}$#';
$patternText = '#^[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ].+$#';
$patternCity = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
   <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="url"/>
      <link rel="stylesheet" href="assets/css/style.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
      <title><?php echo $result[0]->title; ?></title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="0.html">Maçonnerie Ocordo</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                  <a class="nav-link <?php if($test == 1) { echo 'nav-selected';} ?>" href="1.html"><?= $firstPage[0]->menu ?></a>
               </li>      
               <li class="nav-item">
                  <a class="nav-link <?php if($test == 2) { echo 'nav-selected';} ?>" href="2.html"><?= $secondPage[0]->menu ?></a>
               </li>      
               <li class="nav-item">
                  <a class="nav-link <?php if($test == 3) { echo 'nav-selected';} ?>" href="3.html"><?= $thirdPage[0]->menu ?></a>
               </li>      
               <li class="nav-item">
                  <a class="nav-link <?php if($test == 4) { echo 'nav-selected';} ?>" href="4.html"><?= $fourthPage[0]->menu ?></a>
               </li>
            </ul>
         </div>
      </nav>
      <?php
      echo $result[0]->content;

      if (count($_POST) > 0) {
         if (!empty($_POST['your-name'])) {
            if (preg_match($patternName, $_POST['your-name'])) {
               $lastName = strip_tags($_POST['your-name']);
            } else {
               $formErrors['your-name'] = 'Merci de renseigner un nom de famille valide';
            }
         } else {
            $formErrors['your-name'] = 'Merci de renseigner votre nom de famille';
         }
         if (!empty($_POST['your-email'])) {
            if (preg_match($patternMail, $_POST['your-email'])) {
               $eMail = strip_tags($_POST['your-email']);
            } else {
               $formErrors['your-email'] = 'Merci de renseigner une adresse mail valide';
            }
         } else {
            $formErrors['your-email'] = 'Merci de renseigner une adresse mail';
         }
         if (!empty($_POST['your-tel-615'])) {
            if (preg_match($patternPhone, $_POST['your-tel-615'])) {
               $phone = strip_tags($_POST['your-tel-615']);
            } else {
               $formErrors['your-tel-615'] = 'Merci de renseigner un numéro de téléphone valide';
            }
         } else {
            $formErrors['your-tel-615'] = 'Merci de renseigner un numéro de téléphone';
         }
         if (!empty($_POST['your-subject'])) {
            if (preg_match($patternText, $_POST['your-subject'])) {
               $subject = strip_tags($_POST['your-subject']);
            } else {
               $formErrors['your-subject'] = 'Merci de renseigner un sujet';
            }
         } else {
            $formErrors['your-subject'] = 'Merci de renseigner un sujet';
         }
         if (!empty($_POST['your-ville'])) {
            if (preg_match($patternCity, $_POST['your-ville'])) {
               $city = strip_tags($_POST['your-ville']);
            } else {
               $formErrors['your-ville'] = 'Merci de renseigner une ville';
            }
         } else {
            $formErrors['your-ville'] = 'Merci de renseigner une ville';
         }
         if (!empty($_POST['your-message'])) {
            if (preg_match($patternCity, $_POST['your-message'])) {
               $message = strip_tags($_POST['your-message']);
            } else {
               $formErrors['your-message'] = 'Merci de renseigner une message';
            }
         } else {
            $formErrors['your-message'] = 'Merci de renseigner une message';
         }
         ?>
         <p> <?php echo isset($lastName) ? $lastName : $formErrors['your-name']; ?></p>
         <p><?php echo isset($eMail) ? $eMail : $formErrors['your-email']; ?></p>
         <p><?php echo isset($phone) ? $phone : $formErrors['your-tel-615']; ?></p>
         <p><?php echo isset($subject) ? $subject : $formErrors['your-subject']; ?></p>
         <p><?php echo isset($city) ? $city : $formErrors['your-ville']; ?></p>
         <p><?php echo isset($message) ? $message : $formErrors['your-message']; ?></p>
         <?php } ?>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
   </body>
</html>
