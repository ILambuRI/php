<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOAP & cURL</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  
    <nav class="navbar navbar-default col-md-10 col-md-offset-1">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">SOAP & cURL</a>
        </div>

        <div class="collapse navbar-collapse">
          <form class="navbar-form navbar-left" enctype="multipart/form-data" action="" method="POST">
            <div class="form-group">
              <input name="userInput" type="text" class="btn btn-info" placeholder="Number of players">
            </div>
            <button type="submit" class="btn btn-success">SEND</button>
          </form>
          <div>
          <p class="navbar-text navbar-right">
            SOAP:<br>
            Gold Spot Price: <?=$goldSoap["Gold Spot Price"]?><br>
            Change (%): <?=$goldSoap["Change (%)"]?>
          </p>
          <p class="navbar-text navbar-left">
            cURL:<br>
            Gold Spot Price: <?=$goldCurl["Gold Spot Price"]?><br>
            Change (%): <?=$goldCurl["Change (%)"]?>
          </p>
          </div>
        </div>
      </div>
    </nav>

    <div class="row col-md-10 col-md-offset-1">
      <div class="col-md-6">
      
        <?php
          if ($footballSoap)
          {
        ?>
            <p>SOAP:</p>
        <?php
            foreach ($footballSoap as $key => $value)
            {
        ?>
              <div class="col-md-6">
              <p>
                №<?=$key + 1?>: <br>
                Footballer's name: <?=$value['name']?> <br>
                Total goals: <?=$value['goals']?> <br>
                Footballer's flag: <img src="<?=$value['flag']?>" alt="">
              </p>
              </div>
          
        <?php
            }
          }
        ?>
      </div>

      <div class="col-md-6">
        <?php
          if ($footballCurl)
          {
        ?>
            <p>cURL:</p>
        <?php
            foreach ($footballCurl as $key => $value)
            {
        ?>
              <div class="col-md-6">
              <p>
                №<?=$key + 1?>: <br>
                Footballer's name: <?=$value['name']?> <br>
                Total goals: <?=$value['goals']?> <br>
                Footballer's flag: <img src="<?=$value['flag']?>" alt="">
              </p>
              </div>
          
        <?php
            }
          }
        ?>
      </div>
  </body>
</html>