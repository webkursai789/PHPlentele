<?php
require 'DBConnector.php';

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index.php");
}

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
    $lgreitis = $_POST['lgreitis'];
    $fgreitis = $_POST['fgreitis'];
    $bauda = $_POST['bauda'];
    $sumoketa = $_POST['sumoketa'];


    // validate input
    $valid = true;
    if (empty($numeris)) {
        $numerisError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($modelis)) {
        $modelisError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($marke)) {
        $markeError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($metai)) {
        $metaiError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($lgreitis)) {
        $lgreitisError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($fgreitis)) {
        $fgreitisError = 'Please enter Name';
        $valid = false;
    }

    $valid = true;
    if (empty($bauda)) {
        $baudaError = 'Please enter Name';
        $valid = false;
    }


    $valid = true;
    if (empty($sumoketa)) {
        $sumoketaError = 'Please enter Name';
        $valid = false;
    }







    // update data
    if ($valid) {
        $pdo = DBConnector::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `masinos`  SET `numeris` = ?, `modelis` = ?, `marke` = ?, `metai` = ?,`lgreitis` = ?,`fgreitis` = ?,`bauda` = ?,`sumoketa` = ? WHERE `id` = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($numeris,$modelis,$marke,$metai,$lgreitis,$fgreitis,$bauda,$sumoketa,$id));
        DBConnector::disconnect();
        header("Location: index.php");
    }
} else {
    $pdo = DBConnector::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM masinos WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $numeris = $data['numeris'];
    $modelis = $data['modelis'];
    $marke = $data['marke'];
    $metai = $data['metai'];
    $lgreitis = $data['lgreitis'];
    $fgreitis = $data['fgreitis'];
    $bauda = $data['bauda'];
    $sumoketa = $data['sumoketa'];
    DBConnector::disconnect();
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
            <h3> Redaguokite masina!</h3>
        </div>

        <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
            <div class="control-group <?php echo !empty($numerisError)?'error':'';?>">
                <label class="control-label">Numeris</label>
                <div class="controls">
                    <input name="numeris" type="text"  placeholder="Numeris" value="<?php echo !empty($numeris)?$numeris:'';?>">
                    <?php if (!empty($numerisError)): ?>
                        <span class="help-inline"><?php echo $numerisError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($modelisError)?'error':'';?>">
                <label class="control-label">Modelis</label>
                <div class="controls">
                    <input name="modelis" type="text" placeholder="Modelis" value="<?php echo !empty($modelis)?$modelis:'';?>">
                    <?php if (!empty($modelisError)): ?>
                        <span class="help-inline"><?php echo $modelisError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($markeError)?'error':'';?>">
                <label class="control-label">Marke</label>
                <div class="controls">
                    <input name="marke" type="text"  placeholder="Marke" value="<?php echo !empty($marke)?$marke:'';?>">
                    <?php if (!empty($markeError)): ?>
                        <span class="help-inline"><?php echo $markeError;?></span>
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
            <div class="control-group <?php echo !empty($lgreitisError)?'error':'';?>">
                <label class="control-label">Leistinas greitis</label>
                <div class="controls">
                    <input name="lgreitis" type="text"  placeholder="Leistinas greitis" value="<?php echo !empty($lgreitis)?$lgreitis:'';?>">
                    <?php if (!empty($lgreitisError)): ?>
                        <span class="help-inline"><?php echo $lgreitisError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($fgreitisError)?'error':'';?>">
                <label class="control-label">Fiksuotas greitis</label>
                <div class="controls">
                    <input name="fgreitis" type="text"  placeholder="fiksuotas greitis" value="<?php echo !empty($fgreitis)?$fgreitis:'';?>">
                    <?php if (!empty($fgreitisError)): ?>
                        <span class="help-inline"><?php echo $fgreitisError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($baudaError)?'error':'';?>">
                <label class="control-label">Bauda</label>
                <div class="controls">
                    <input name="bauda" type="text"  placeholder="Bauda" value="<?php echo !empty($bauda)?$bauda:'';?>">
                    <?php if (!empty($baudaError)): ?>
                        <span class="help-inline"><?php echo $baudaError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($sumoketaError)?'error':'';?>">
                <label class="control-label">Sumoketa</label>
                <div class="controls">
                    <input name="sumoketa" type="text"  placeholder="sumoketa" value="<?php echo !empty($sumoketa)?$sumoketa:'';?>">
                    <?php if (!empty($sumoketaError)): ?>
                        <span class="help-inline"><?php echo $sumoketaError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn" href="index.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>
