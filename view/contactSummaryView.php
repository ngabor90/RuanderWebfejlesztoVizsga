<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapcsolattartók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        <?php include "style.css" ?>
    </style>
</head>

<body>

    <?php include_once ("assets/navbar.php") ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h1>Kapcsolattartók</h1>

                <table class="table table-striped">
                    <thead class="table-light">
                        <th>Termék ID</th>
                        <th>Keresztnév</th>
                        <th>Középsőnév</th>
                        <th>Vezetéknév</th>
                        <th>Telefonszám</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($contacts); $i++) {
                            echo ("<tr class='table table-dark'>");
                            /*echo ("<td>" . $contacts[$i]->getId() . "</td>");*/
                            echo ("<td>" . $contacts[$i]->getProductId() . "</td>");
                            echo ("<td>" . $contacts[$i]->getFirstName() . "</td>");
                            echo ("<td>" . $contacts[$i]->getMiddleName() . "</td>");
                            echo ("<td>" . $contacts[$i]->getLastName() . "</td>");
                            echo ("<td>" . $contacts[$i]->getPhone() . "</td>");
                            echo ("<td>" . $contacts[$i]->getEmail() . "</td>");
                            echo ("</tr>");
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php include_once ("assets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>