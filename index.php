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
if (!empty($_POST)) {
    $_SESSION['customer'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    print_r($_SESSION);
}

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
// whatIsHappening();

// TODO: provide some products (you may overwrite the example)
$products = [
    ['name' => 'Dinner companion', 'price' => 75],
    ['name' => 'Wedding companion', 'price' => 100],
    ['name' => 'Bf/Gf to impress friends', 'price' => 150],
    ['name' => 'Bf/Gf to impress family', 'price' => 200],
    ['name' => 'Spouse actor', 'price' => 300],
];

$totalValue = totalAmount($products);

function validate()
{
    $invalidFields = [];
    if (empty($_POST['name'])) {
        array_push($invalidFields, 'name');
    }
    if (empty($_POST['email'])) {
        array_push($invalidFields, 'email');
    }
    if (empty($_POST['gender'])) {
        array_push($invalidFields, 'gender');
    }
    if (empty($_POST['genderChosen'])) {
        array_push($invalidFields, 'gender chosen');
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

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function handleForm($products)
{
    // TODO: form related tasks (step 1)

    // Validation (step 2)


    $invalidFields = validate();
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = test_input($_POST['email']);
        $gender = $_POST['gender'];
        $genderChosen = $_POST['genderChosen'];
        $street = $_POST['street'];
        $number = $_POST['streetNumber'];
        $city = $_POST['city'];
        $zipCode = $_POST['zipCode'];

        if (!empty($invalidFields)) {

            foreach ($invalidFields as $data) {
                if ($data === 'products') {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                Please select one of the options above.
                </div>";
                } else {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                Your $data is required.
                </div>";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo
                    "<div class='alert alert-danger' role='alert'>
                Invalid $email format.
                </div>";
                }
            }
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo
            "<div class='alert alert-danger' role='alert'>
        Invalid $email format.
        </div>";
        } else {
            // foreach ($_POST as $i => $field) {
            //     pre_r($_POST);
            //     if (is_array($field)) {
            //         continue;
            //     } else {));
            //     }
            // }
            echo
            "<div class='alert alert-success' role='alert' style='text-align: center'>
                Thanks <b>$name</b> for trusting in us! <br>
                We would like to confirm your personal info as follow: <br>
                <b>Email:</b> $email <br>
                <b>Address:</b> $street $number, $zipCode $city <br>
                <b>Your order:</b> <br>";
            totalProducts($products);
            echo "</div>";
        }
    }
}

function totalProducts($products)
{
    foreach ($_POST['products'] as $i => $service) {
        echo "- " . $products[$i]['name'] . "<br>";
    }
}

function totalAmount($products)
{
    $totalPrice = 0;
    if (!empty($_POST['products'])) {
        foreach ($_POST['products'] as $i => $service) {
            $totalPrice += $products[$i]['price'];
        }
    }
    return $totalPrice;
}


// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm($products);
}

require 'form-view.php';
