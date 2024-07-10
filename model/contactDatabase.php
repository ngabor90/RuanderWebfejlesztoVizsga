<?php

class ContactDatabase
{
    public static function contactRead(): array
    {
        try{
            $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");
            $stmt = $con->prepare("SELECT id, product_id, first_name, middle_name, last_name, phone, email FROM `contacts`");
            $stmt->execute();
            $stmt->bind_result($id, $productId, $firstName, $middleName, $lastName, $phone, $email);
    
            $array = [];
            while ($stmt->fetch()) {
                $array[] = new Contact(
                    $id,
                    $productId,
                    $firstName,
                    $middleName,
                    $lastName,
                    $phone,
                    $email
                );
            }
    
            $stmt->close();
            $con->close();
    
            return $array;
        }
        catch(mysqli_sql_exception){
            return [null];
        }
        
    }

    public static function contactUpload(Contact $contact): void
    {
        try{
            $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");

            $product_id = $contact->getProductId();
            $first_name = $contact->getFirstName();
            $middle_name = $contact->getMiddleName();
            $last_name = $contact->getLastName();
            $phone = $contact->getPhone();
            $email = $contact->getEmail();
    
            $stmt = $con->prepare("INSERT INTO `contacts` (product_id, first_name, middle_name, last_name, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssss", $product_id, $first_name, $middle_name, $last_name, $phone, $email);
            if ($stmt->execute()) {
                echo "Kapcsolattartó sikeresen rögzítve.";
            } else {
                echo "Hiba a kapcsolattartó rögzítésekor: " . $stmt->error;
            }

            $stmt->close();
            $con->close();
        }
        catch(mysqli_sql_exception){
            
        }
    }

    public static function getLastInsertedId():int
    {
        $con = new mysqli("127.0.0.1", "root", "", "webfejlesztoVizsga");
        $result = $con->query("SELECT LAST_INSERT_ID() as last_id");
        $row = $result->fetch_assoc();
        $con->close();
        return (int) $row['last_id'];
    }
}