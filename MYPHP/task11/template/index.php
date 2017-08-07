<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Active Records</title>
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
                <a class="navbar-brand" href="index.php">Active Records</a>
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
        <div class="col-md-4 col-md-offset-4">
            <h2><?=$allfields?></h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-3">
            
                <h2>Insert:</h2>
                <h4>In field 1 record <strong>'<?=$f_1?>'</strong>.</h4> 
                <h4>In field 2 record <strong>'<?=$f_2?>'</strong>.</h4>
                <h4>Result: <?=$res_ins?></h4>
            </div>
            <div class="col-md-3">
                <h2>Sets:</h2>
                <h4>In field <strong>'key'</strong> record <strong>'<?=$v1_set?>'</strong>.</h4> 
                <h4>In field <strong>'data'</strong> record <strong>'<?=$v2_set?>'</strong>.</h4>
                <h4>Result: <?=$res_set?></h4>
            </div>
            <div class="col-md-3">
                <h2>Update:</h2>
                <h4>Field <strong>'<?=$f_u?>'</strong> record <strong>'<?=$v_u?>'</strong></h4> 
                <h4>where field <strong>'<?=$f_u_s?>'</strong> has a record <strong>'<?=$v_u_s?>'</strong>.</h4>
                <h4>Result: <?=$res_upd?></h4>
            </div>
            <div class="col-md-3">
                <h2>Delete:</h2>
                <h4>Where field <strong>'<?= $f_d?>'</strong> has a record <strong>'<?= $v_d?>'</strong>.</h4>
                <h4>Result: <?=$res_del?></h4>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <h2>Select all whith <?=$f_s?> = <?=$v_s?> records:</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <tr>
                    <th><?=POLE1?></th>
                    <th><?=POLE2?></th>
                </tr>
                <?php
                for ($i = 0, $cnt = count($res_take); $i < $cnt; $i+=2)
                {
                    $val1 = $i;
                    $val2 = $val1 + 1;
                    ?>
                    <tr>
                        <td><?=$res_take[$val1][POLE1]?></td>
                        <td><?=$res_take[$val2][POLE2]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
  </body>
</html>
