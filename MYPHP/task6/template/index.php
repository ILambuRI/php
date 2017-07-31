<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Music groups</title>
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
                <a class="navbar-brand" href="index.php">Music groups</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <?php
                    foreach ($brigada as $key=>$musician)
                    {
                        if (count($musician) == 2)
                        {
                            ?>
                                <h1>Group name:  <?=$musician['band_info']->getName()?> </h2>
                                <h1>Group genre:  <?=$musician['band_info']->getGenre()?> </h2>
                                <h3>Group members:</h3>
                            <?php
                            $musician = $musician['musician'];
                        }
                        ?>
                            <h3>Musician <?=$brigada->getCnt()?>:</h3>
                        <?php
                        foreach($musician as $key=>$instrument)
                        {
                            if (count($instrument) == 2)
                            {
                                ?>
                                    <h4>Musician name:  <?=$instrument['musician_info']->getName()?> </h4>
                                    <h4>Musician type:  <?=$instrument['musician_info']->getMusicianType()?> </h4>
                                    <h4>Musician group:  <?=$instrument['musician_info']->getNameBand()?> </h4>
                                    <h3>Musician instruments:</h3>
                                <?php
                                $instrument = $instrument['instrument'];
                            }
                            ?>
                                <h3>Instrument <?=$musician->getCnt()?>:</h3>
                            <?php
                            foreach($instrument as $key=>$var)
                            {
                                if (count($var) == 2)
                                {
                                    ?>
                                        <h4>Name:  <?=$var['instrument_info']->getName()?> </h4>
                                        <h4>Category:  <?=$var['instrument_info']->getCategory()?> </h4>
                                        <h4>Instrument holders:</h4>
                                        <h4>Holder <?=$instrument->getCnt()?>:</h4>
                                        <h4>Name:<?=$var['holder']['name']?></h4>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <h4>Holder <?=$instrument->getCnt()?>:</h4>
                                    <h4>Name:<?=$var['name']?></h4>
                                <?php
                                }
                            }
                        }
                    }
                ?>
            </div>
            <div class="col-md-6">
                <?php
                    foreach ($raduga as $key=>$musician)
                    {
                        if (count($musician) == 2)
                        {
                            ?>
                                <h1>Group name:  <?=$musician['band_info']->getName()?> </h2>
                                <h1>Group genre:  <?=$musician['band_info']->getGenre()?> </h2>
                                <h3>Group members:</h3>
                            <?php
                            $musician = $musician['musician'];
                        }
                        ?>
                            <h3>Musician <?=$raduga->getCnt()?>:</h3>
                        <?php
                        foreach($musician as $key=>$instrument)
                        {
                            if (count($instrument) == 2)
                            {
                                ?>
                                    <h4>Musician name:  <?=$instrument['musician_info']->getName()?> </h4>
                                    <h4>Musician type:  <?=$instrument['musician_info']->getMusicianType()?> </h4>
                                    <h4>Musician group:  <?=$instrument['musician_info']->getNameBand()?> </h4>
                                    <h3>Musician instruments:</h3>
                                <?php
                                $instrument = $instrument['instrument'];
                            }
                            ?>
                                <h3>Instrument <?=$musician->getCnt()?>:</h3>
                            <?php
                            foreach($instrument as $key=>$var)
                            {
                                if (count($var) == 2)
                                {
                                    ?>
                                        <h4>Name:  <?=$var['instrument_info']->getName()?> </h4>
                                        <h4>Category:  <?=$var['instrument_info']->getCategory()?> </h4>
                                        <h4>Instrument holders:</h4>
                                        <h4>Holder <?=$instrument->getCnt()?>:</h4>
                                        <h4>Name:<?=$var['holder']['name']?></h4>
                                    <?php
                                }
                                else
                                {
                                ?>
                                    <h4>Holder <?=$instrument->getCnt()?>:</h4>
                                    <h4>Name:<?=$var['name']?></h4>
                                <?php
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
  </body>
</html>