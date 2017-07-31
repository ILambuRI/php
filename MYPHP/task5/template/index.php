<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realization of interface</title>
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
                <a class="navbar-brand" href="index.php">Realization of interface</a>
            </div>
            <?php
            if ($error)
            {
                ?>
                <div class='alert alert-warning col-md-4 col-md-offset-1' role='alert'>
                    <?=$error?>
                </div>
                <?php
            }
            ?>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6">
                <h2>Cookie:</h2>
                <h4>Cookie whith name '<?=$key_c_del?>' was deleted: '<?=$res_c_del?>'.</h4> 
                <h4>Cookie whith name '<?=$key_c_save?>' and record '<?=$val_c_save?>' were sent to the client.</h4>
                <h4>Cookie whith name '<?=$key_c_save?>' have a record '<?=$res_c?>'.</h4>
            </div>
            <div class="col-md-6">
                <h2>Session:</h2>
                <h4>Session whith name '<?=$key_s_del?>' was deleted: '<?=$res_s_del?>'.</h4> 
                <h4>Session whith name '<?=$key_s_save?>' and record '<?=$val_s_save?>' were assigned to the client.</h4>
                <h4>Session whith name '<?=$key_s_save?>' have a record '<?=$res_s?>'.</h4>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-7 col-md-offset-2">
                <h2>MySQL:</h2>
                <h4>Record whith value '<?=$key_m_del?>' was deleted: '<?=$res_m_del?>'.</h4> 
                <h4>Record whith  '<?=POLE1 ." = ". $key_m_save?>' and  '<?=POLE2 ." = ". $val_m_save?>' was recorded in the database: '<?=$res_m_save?>'</h4>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 col-md-offset-4">
                <h3>Get all records whith <?=$key_m_get?>:</h3>
            </div>
            <div class="col-md-4 col-md-offset-3">
                <table class="table table-hover">
                    <tr>
                        <th><?=POLE1?></th>
                        <th><?=POLE2?></th>
                    </tr>
                    <?php
                    for ($i = 0, $cnt = count($res_m); $i < $cnt; $i+=2)
                    {
                        $val1 = $i;
                        $val2 = $val1 + 1;
                        ?>
                        <tr>
                            <td><?=$res_m[$val1][POLE1]?></td>
                            <td><?=$res_m[$val2][POLE2]?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-7 col-md-offset-2">
                <h2>PostgreSQL:</h2>
                <h4>Record whith value '<?=$key_p_del?>' was deleted: '<?=$res_p_del?>'.</h4> 
                <h4>Record whith  '<?=POLE1 ." = ". $key_p_save?>' and  '<?=POLE2 ." = ". $val_p_save?>' was recorded in the database: '<?=$res_p_save?>'</h4>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 col-md-offset-4">
                <h3>Get all records whith <?=$key_p_get?>:</h3>
            </div>
            <div class="col-md-4 col-md-offset-3">
                <table class="table table-hover">
                    <tr>
                        <th><?=POLE1?></th>
                        <th><?=POLE2?></th>
                    </tr>
                    <?php
                    for ($i = 0, $cnt = count($res_p); $i < $cnt; $i+=2)
                    {
                        $val1 = $i;
                        $val2 = $val1 + 1;
                        ?>
                        <tr>
                            <td><?=$res_p[$val1][POLE1]?></td>
                            <td><?=$res_p[$val2][POLE2]?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    
  </body>
</html>