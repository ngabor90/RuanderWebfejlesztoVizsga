<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szervíz összesítő</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        <?php include "style.css"; ?>
    </style>

</head>

<body>

    <?php include_once ("assets/navbar.php"); ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h1>Szervíz összesítő</h1>

                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Szériaszám</th>
                            <th>Gyártó</th>
                            <th>Típus</th>
                            <th>Leadás dátuma</th>
                            <th>Státusz</th>
                            <th>Utolsó státuszváltozás időpontja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $statusColors = array(
                            "Beérkezett" => "bg-primary",
                            "Hibafeltárás" => "bg-danger",
                            "Alkatrész beszerzés alatt" => "bg-warning",
                            "Javítás" => "bg-purple",
                            "Kész" => "bg-success"
                        );
                        
                        for ($i = 0; $i < count($products); $i++) {
                            $status = $products[$i]->getStatus();
                            $backgroundColorClass = isset($statusColors[$status]) ? $statusColors[$status] : "bg-light";
                            echo "<tr>";
                            /*echo "<td class='$backgroundColorClass'>" . $products[$i]->getId() . "</td>";*/
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getSerialNumber() . "</td>";
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getManufacturer() . "</td>";
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getType() . "</td>";
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getStatus() . "</td>";
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getSubmissionDate() . "</td>";
                            echo "<td class='$backgroundColorClass'>" . $products[$i]->getLastStatusChange() . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include_once ("assets/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>