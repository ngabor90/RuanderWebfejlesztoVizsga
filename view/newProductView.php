<?php
require_once "../model/productDatabase.php";
require_once "../model/contactDatabase.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék leadása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        <?php include "style.css" ?>
    </style>
</head>

<body>

    <?php include_once ("assets/navbar.php"); ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h1>Új termék leadása</h1>
                <form method="post">
                    <div class="form-group my-4">
                        <label for="serial_number" class="form-label">Szériaszám</label>
                        <input placeholder="GGG666" type="text" class="form-control" id="serial_number" name="serial_number" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="manufacturer" class="form-label">Gyártó</label>
                        <input placeholder="Lenovo" type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="type" class="form-label">Típus</label>
                        <input placeholder="Laptop" type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="name" class="form-label">Keresztnév</label>
                        <input placeholder="István" type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="name" class="form-label">Középsőnév</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name">
                    </div>
                    <div class="form-group my-4">
                        <label for="name" class="form-label">Vezetéknév</label>
                        <input placeholder="Kovács" type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="form-group my-4">
                        <label for="serial_number" class="form-label">Telefonszám</label>
                        <input placeholder="0630123456789" type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group my-4">
                        <label for="serial_number" class="form-label">Email</label>
                        <input placeholder="istvan.kovacs@example.com" type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <button type="submit" name="upload" id="upload" value="Upload" class="btn btn-primary">Mentés</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once ("assets/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>