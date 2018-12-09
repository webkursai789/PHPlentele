<?php
require 'DBConnector.php';

if ( !empty($_POST)) {
    // keep track validation errors
    $numerisError = null;
    $modelisError = null;
    $markeError = null;

    $metaiError = null;
    $leistinasError = null;
    $fiksuotasError = null;
    $baudaError = null;
    $sumoketaError = null;



    // keep track post values
    $numeris = $_POST['numeris'];
    $modelis = $_POST['modelis'];
    $marke = $_POST['marke'];
    $metai = $_POST['metai'];

    $lgreitis= $_POST['lgreitis'];
    $fgreitis= $_POST['fgreitis'];
    $bauda= $_POST['bauda'];
    $sumoketa= $_POST['sumoketa'];

    // validate input
    $valid = true;
    if (empty($numeris)) {
        $nameError = 'Please enter Numeri';
        $valid = false;
    }

    $valid = true;
    if (empty($modelis)) {
        $modelisError = 'Please enter Modeli';
        $valid = false;


    }
    $valid = true;
    if (empty($metai)) {
        $metaiError = 'Please enter metus';
        $valid = false;
    }

    $valid = true;
    if (empty($lgreitis)) {
        $lgreitisError = 'Please enter Numeri';
        $valid = false;
    }

    $valid = true;
    if (empty($modelis)) {
        $nameError = 'Please enter Numeri';
        $valid = false;
    }







    // insert data
    if ($valid) {
        $pdo = DBConnector::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO masinos (numeris,marke,modelis,metai,lgreitis,fgreitis,bauda,sumoketa ) values(?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($numeris,$marke,$modelis,$metai,$lgreitis,$fgreitis,$bauda,$sumoketa));
        DBConnector::disconnect();
        header("Location: index.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>



</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Pridekite masina</h3>
        </div>

        <form class="form-horizontal" action="create.php" method="post">
            <div class="control-group <?php echo !empty($numerisError)?'error':'';?>">
                <label class="control-label">Numeris</label>
                <div class="controls">
                    <input name="numeris" type="text"  placeholder="Numeris" value="<?php echo !empty($numeris)?$numeris:'';?>">
                    <?php if (!empty($numerisError)): ?>
                        <span class="help-inline"><?php echo $numerisError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($markeError)?'error':'';?>">
                <label class="control-label">Marke</label>
                <div class="controls">
                    <input name="marke" type="text" placeholder="Marke" value="<?php echo !empty($marke)?$marke:'';?>">
                    <?php if (!empty($markeError)): ?>
                        <span class="help-inline"><?php echo $markeError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($modelisError)?'error':'';?>">
                <label class="control-label">Modelis</label>
                <div class="controls">
                    <input name="modelis" type="text"  placeholder="Modelis" value="<?php echo !empty($modelis)?$modelis:'';?>">
                    <?php if (!empty($modelisError)): ?>
                        <span class="help-inline"><?php echo $modelisError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($metaiError)?'error':'';?>">
                <label class="control-label">Metai</label>
                <div class="controls">
                    <input name="metai" type="text"  placeholder="Metai" value="<?php echo !empty($metai)?$metai:'';?>">
                    <?php if (!empty($metaiError)): ?>
                        <span class="help-inline"><?php echo $metaiError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($Error)?'error':'';?>">
                <label class="control-label">lgreitis</label>
                <div class="controls">
                    <input name="lgreitis" type="text"  placeholder="lgreitis" value="<?php echo !empty($lgreitis)?$lgreitis:'';?>">
                    <?php if (!empty($fgreitisError)): ?>
                        <span class="help-inline"><?php echo $leistinasError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($Error)?'error':'';?>">
                <label class="control-label">fgreitis</label>
                <div class="controls">
                    <input name="fgreitis" type="text"  placeholder="fgreitis" value="<?php echo !empty($fgreitis)?$fgreitis:'';?>">
                    <?php if (!empty($fgreitisError)): ?>
                        <span class="help-inline"><?php echo $fiksuotasError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($Error)?'error':'';?>">
                <label class="control-label">bauda</label>
                <div class="controls">
                    <input name="bauda" type="text"  placeholder="bauda" value="<?php echo !empty($bauda)?$bauda:'';?>">
                    <?php if (!empty($baudaError)): ?>
                        <span class="help-inline"><?php echo $baudaError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($Error)?'error':'';?>">
                <label class="control-label">sumoketa</label>
                <div class="controls">
                    <input name="sumoketa" type="text"  placeholder="sumoketa" value="<?php echo !empty($sumoketa)?$sumoketa:'';?>">
                    <?php if (!empty($sumoketaError)): ?>
                        <span class="help-inline"><?php echo $sumoketaError;?></span>
                    <?php endif;?>
                </div>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->

</body>
</html>