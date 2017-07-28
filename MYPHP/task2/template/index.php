<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Download</title>
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
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Сalculator</a>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <h2>Plus:</h2>
                <h4><?=$resPlus?></h4>
            </div>
            <div class="col-md-2">
                <h2>Minus:</h2>
                <h4><?=$resMinus?></h4>
            </div>
            <div class="col-md-2">
                <h2>Division:</h2>
                <h4><?=$resDelenie?></h4>
            </div>
            <div class="col-md-2">
                <h2>Multiplication:</h2>
                <h4><?=$resUmnoj?></h4>
            </div>
            <div class="col-md-2">
                <h2>Root:</h2>
                <h4><?=$resKoren?></h4>
            </div>
            <div class="col-md-2">
                <h2>Percent:</h2>
                <h4><?=$resProc?></h4>
            </div>
        </div>
            <div class="col-md-10 col-md-offset-1">
            <div class="col-md-3 col-md-offset-4">
                <h2>Operation with memory:</h2>
                <h4><?=$resRm1?></h4>                
                <h4><?=$resRm2?></h4>                
                <h4><?=$resRm3?></h4>                
                <h4><?=$resRm4?></h4>                
                <h4><?=$resRm5?></h4>                
            </div>
        </div>
    </div>
    
  </body>
</html>
