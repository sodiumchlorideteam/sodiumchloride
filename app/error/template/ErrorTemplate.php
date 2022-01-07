<?php
use Error\Class\Error;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $code; ?> | <?php  echo Error::RETURN_ERROR($code); ?></title>

  <style type="text/css">
    body {
      padding: 30px 20px;
      font-family: -apple-system, BlinkMacSystemFont,
        "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell",
        "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
      color: #727272;
      line-height: 1.6;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
    }

    h1 {
      margin: 0 0 40px;
      font-size: 60px;
      line-height: 1;
      color: #252427;
      font-weight: 700;
    }

    h2 {
      margin: 100px 0 0;
      font-size: 20px;
      font-weight: 600;
      letter-spacing: 0.1em;
      color: #A299AC;
      text-transform: uppercase;
    }

    p {
      font-size: 16px;
      margin: 1em 0;
    }

    .go-back a {
      display: inline-block;
      margin-top: 3em;
      padding: 10px;
      color: #1B1A1A;
      font-weight: 700;
      border: solid 2px #e7e7e7;
      text-decoration: none;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 0.1em;
    }

    .go-back a:hover {
      border-color: #1B1A1A;
    }

    @media screen and (min-width: 768px) {
      body {
        padding: 50px;
      }
    }

    @media screen and (max-width: 480px) {
      h1 {
        font-size: 30px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2><?php echo $code;  ?></h2>
  <h1><?php  echo Error::RETURN_ERROR($code); ?></h1>

<?php
if ($code == 404) {
?>
  <p>We’re sorry but it appears that we can’t find the page you were looking for. Usually this occurs because of a page that previously existed was removed or you’ve mistyped the address.</p>
<?php
}
elseif($code == 400){
?>
<p>We’re sorry but something appears to be wrong with the request you made, please try again.</p>
<?php
}
elseif($code == 502){
?>
<p>We’re sorry but something appears to be wrong with the request you made, please check your internet connection or try again.</p>
<?php
}
else{
?>
<p>We’re sorry but error occurs</p>
<?php
 } 
 ?>
  <span class="go-back"><a href="<?php echo $directory->root; ?>">Go back</a></span>
</div>

</body>
</html>
