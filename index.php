<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    pre_r($_GET);
    echo '<h2>$_POST</h2>';
    pre_r($_POST);
    // echo '<h2>$_COOKIE</h2>';
    // var_dump($_COOKIE);
    // echo '<h2>$_SESSION</h2>';
    // var_dump($_SESSION);
}
whatIsHappening();

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Dinner companion', 'price' => 75],
    ['name' => 'Wedding companion', 'price' => 100],
    ['name' => 'Bf/Gf to impress friends', 'price' => 150],
    ['name' => 'Bf/Gf to impress family', 'price' => 200],
    ['name' => 'Funerary crier actor', 'price' => 300],
];

// if (isset($_POST['submit'])) {
//     foreach ($products['price'];
// }
$totalValue = 0;

// $emailERR = $streetERR = $numbErr = $cityErr = $zipERR = "";
$email = $street = $numb = $city = $zip = "";

function validate()
{
    $invalidFields = [];
    if (empty($_POST['email'])) {
        array_push($invalidFields, 'email');
    }
    if (empty($_POST['street'])) {
        array_push($invalidFields, 'street');
    }
    if (empty($_POST['streetNumber'])) {
        array_push($invalidFields, 'street number');
    }
    if (empty($_POST['city'])) {
        array_push($invalidFields, 'city');
    }
    if (empty($_POST['zipCode'])) {
        array_push($invalidFields, 'zip code');
    }
    if (empty($_POST['products'])) {
        array_push($invalidFields, 'products');
    }
    return $invalidFields;
}

function handleForm($products)
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)
    $invalidFields = validate();
    if (isset($_POST['submit'])) {
        if (!empty($invalidFields)) {
            foreach ($invalidFields as $data) {
                if ($data === 'products') {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                Please select one of the options above
                </div>";
                } else {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                Your $data is required
                </div>";
                }
            }
        } else {
        }
        //     if (!empty($_POST['email'])) {
        //         "Email is required";
        //     } else {
        //         $GLOBAL['email'] = $_POST['email'];
        //     }
        //     if (!empty($_POST['street'])) {
        //         "Street is required";
        //     } else {
        //         $street = $_POST['street'];
        //     }
        //     if (!empty($_POST['streetNumber'])) {
        //         "Number is required";
        //     } else {
        //         $streetNumber = $_POST['streetNumber'];
        //     }
        //     if (!empty($_POST['city'])) {
        //         "City is required";
        //     } else {
        //         $city = $_POST['city'];
        //     }
        //     if (!empty($_POST['zipCode'])) {
        //         "Zip code is required";
        //     } else {
        //         $zipCode = $_POST['zipCode'];
        //     }
    }
}


// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm($products);
}

require 'form-view.php';
