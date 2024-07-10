<?php

class ProductDatabase
{
    public static function productRead(): array
    {
        try {
            $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");
            $stmt = $con->prepare("SELECT id, serial_number, manufacturer, type, status, submission_date, last_status_change
                FROM `products`
                WHERE status != 'Kész' OR (status = 'Kész' AND DATE(last_status_change) = CURDATE())
                ORDER BY FIELD(status, 'Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész')");
            $stmt->execute();
            $result = $stmt->get_result();
    
            $array = [];
            while ($row = $result->fetch_assoc()) {
                $array[] = new Product(
                    /*$row['id'],*/
                    $row['serial_number'],
                    $row['manufacturer'],
                    $row['type'],
                    $row['status'],
                    $row['submission_date'],
                    $row['last_status_change']
                );
            }
    
            $stmt->close();
            $con->close();
    
            return $array;
        } catch(mysqli_sql_exception) {
            return [null];
        }
    }

   public static function productUpload(Product $product): void
    {
        try{
            $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");

            $serial_number = $product->getSerialNumber();
            $manufacturer = $product->getManufacturer();
            $type = $product->getType();
            $status = $product->getStatus();
            $submission_date = $product->getSubmissionDate();
            $last_status_change = $product->getLastStatusChange();
    
            $stmt = $con->prepare("INSERT INTO `products` (serial_number, manufacturer, type, status, submission_date, last_status_change) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $serial_number, $manufacturer, $type, $status, $submission_date, $last_status_change);
            if ($stmt->execute()) {
                echo "Termék sikeresen rögzítve.";
            } else {
                echo "Hiba a termék rögzítésekor: " . $stmt->error;
            }

            $product_id = $con->insert_id;
    
            $stmt->close();
            $con->close();
        }
        catch(mysqli_sql_exception){

        }
        
    }
    public static function getLastInsertedId()
    {
        $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");
        $result = $con->query("SELECT LAST_INSERT_ID() as last_id");
        $row = $result->fetch_assoc();
        $con->close();
        return $row['last_id'];
    }
}
