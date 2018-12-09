<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Masinu Lentele</h3>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Prideti</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>numeris</th>
                <th>marke</th>
                <th>modelis</th>
                <th>metai</th>
                <th>lgreitis</th>
                <th>fgreitis</th>
                <th>bauda</th>
                <th>sumoketa</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'DBConnector.php';
            $pdo = DBConnector::connect();
            $sql = 'SELECT * FROM masinos ORDER BY id ASC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['numeris'] . '</td>';
                echo '<td>'. $row['marke'] . '</td>';
                echo '<td>'. $row['modelis'] . '</td>';
                echo '<td>'. $row['metai'] . '</td>';
                echo '<td>'. $row['lgreitis'] . '</td>';
                echo '<td>'. $row['fgreitis'] . '</td>';
                echo '<td>'. $row['bauda'] . '</td>';
                echo '<td>'. $row['sumoketa'] . '</td>';


                echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Trinti</a></td>';
                echo '<td><a class="btn btn-success" href="update.php?id='.$row['id'].'">Redaguoti</a></td>';



            }
            DBConnector::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>