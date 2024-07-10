<?php

function load($class)
{
    $path = "../model/";
    include $path . $class . ".php";
}

spl_autoload_register("load");

function productSummaryView()
{
    $products = ProductDatabase::productRead();
    include "../view/productSummaryView.php";
}

function contactSummaryView()
{
    $contacts = ContactDatabase::contactRead();
    include "../view/contactSummaryView.php";
}

function newProductView()
{
    return include "../view/newProductView.php";
}

function newProduct()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $serial_number = $_POST['serial_number'];
        $manufacturer = $_POST['manufacturer'];
        $type = $_POST['type'];
        $submission_date = date("Y-m-d");
        $status = "Beérkezett";
        $last_status_change = date("Y-m-d H:i:s");
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $newProduct = new Product($serial_number, $manufacturer, $type, $status, $submission_date, $last_status_change);
        ProductDatabase::productUpload($newProduct);

        $product_id = ProductDatabase::getLastInsertedId();
        
        $newContact = new Contact(null, $product_id, $first_name, $middle_name, $last_name, $phone, $email);
        ContactDatabase::contactUpload($newContact);
        
    }

    return include("../view/newProductView.php");
}


function errorView()
{
    include "../view/errorView.php";
}

function Main()
{
    if (array_key_exists("page", $_GET)) {
        $page = $_GET["page"];
    } else {
        $page = "productSummaryView";
    }
    if(array_key_exists("serial_number", $_POST)){
        $page = "newProduct";
    }

    switch ($page) {
        case "productSummaryView":
            productSummaryView();
            break;

        case "contactSummaryView":
            contactSummaryView();
            break;

        case "newProductView":
            newProductView();
            break;

        case "newProduct":
            newProduct();
            break;

        default:
            errorView();
            break;
    }
}

Main();
