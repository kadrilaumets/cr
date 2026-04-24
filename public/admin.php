<?php
session_start();
require_once('config.php');

// Sisselogimise kontroll
if (isset($_POST['nupu_nimi'])) {
    if ($_POST['kasutaja'] == 'admin' && $_POST['parool'] == 'admin') {
        $_SESSION['sees'] = "jah";
    } else {
        $viga = "Vale parool!";
    }
}

// Väljalogimine
if (isset($_GET['logi_valja'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<?php if (!isset($_SESSION['sees'])): ?>
    
    <div style="max-width: 300px; margin: auto;" class="border p-4 shadow-sm">
        <h3>Admin sisselogimine</h3>
        <?php if(isset($viga)) echo "<p style='color:red'>$viga</p>"; ?>
        <form method="POST">
            Kasutaja: <input type="text" name="kasutaja" class="form-control mb-2">
            Parool: <input type="password" name="parool" class="form-control mb-3">
            <input type="submit" name="nupu_nimi" value="Logi sisse" class="btn btn-primary w-100">
        </form>
    </div>

<?php else: ?>

    <div class="d-flex justify-content-between">
        <h1>admin</h1>
        <a href="?logi_valja=1" class="btn btn-outline-danger btn-sm align-self-center">Logi välja</a>
    </div>

    <table border="1" class="table table-striped mt-3">
        <tr>
            <td>Mark</td>
            <td>Model</td>
            <td>Engine</td>
            <td>Fuel</td>
            <td>Price</td>
            <td>Image</td>
            <td>Kustuta</td>
            <td>Muuda</td>
        </tr>
        <?php 
            $paring = "SELECT * FROM cars LIMIT 8";
            $valjund = mysqli_query($yhendus, $paring);

            while($rida = mysqli_fetch_assoc($valjund)){
               echo "<tr>
                    <td>".$rida['mark']."</td>
                    <td>".$rida['model']."</td>
                    <td>".$rida['engine']."</td>
                    <td>".$rida['fuel']."</td>
                    <td>".$rida['price']."</td>
                    <td>".$rida['image']."</td>
                    <td><a href='kustuta.php?id=".$rida['id']."'>Kustuta</a></td>
                    <td><a href='muuda.php?id=".$rida['id']."'>Muuda</a></td>
                </tr>";
            }
        ?>
    </table>

<?php endif; ?>

</body>
</html>