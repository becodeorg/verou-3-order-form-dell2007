<?php // This file is mostly containing things for your view / html 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <title>Fake it until you make it!</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container mt-5">
        <h1 style="text-align: center;">Fake it until you make it!</h1> <br>
        <p style="text-align: center;">Tired of going to special events by yourself? <br>
            That is something from the past. Order your companion here and now!</p>
        <h2>Place your order</h2>
        <?php // Navigation for when you need it 
        ?>
        <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Full name:</label>
                    <input type="name" id="name" name="name" class="form-control" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" class="form-control" value="
                    <?php
                    echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="text">I am:</label>
                    <input type="radio" name="gender">Male
                    <input type="radio" name="gender">Female
                    <input type="radio" name="gender">Unicorn
                </div>
                <div class="form-group col-md-6">
                    <label for="text">I would like:</label>
                    <input type="radio" name="gender">Female
                    <input type="radio" name="gender">Male
                    <input type="radio" name="gender">Fairy
                </div>
            </div>

            <fieldset>
                <legend>Address</legend>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="street">Street:</label>
                        <input type="text" name="street" id="street" class="form-control" value="<?php echo isset($_POST["street"]) ? $_POST["street"] : ''; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="streetNumber">Street number:</label>
                        <input type="text" id="streetNumber" name="streetNumber" class="form-control" value="<?php echo isset($_POST["streetNumber"]) ? $_POST["streetNumber"] : ''; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zipCode">Zip Code</label>
                        <input type="text" id="zipCode" name="zipCode" class="form-control" value="<?php echo isset($_POST["zipCode"]) ? $_POST["zipCode"] : ''; ?>">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Services</legend>
                <?php foreach ($products as $i => $product) : ?>
                    <label>
                        <?php // <?= is equal to <?php echo 
                        ?>
                        <input type="checkbox" value="<?php echo $i ?>" name="products[<?php echo $i ?>]" />
                        <?php echo $product['name'] ?> -
                        &euro; <?= number_format($product['price'], 2) ?></label><br />
                <?php endforeach; ?>
            </fieldset>

            <button type="submit" name="submit" class="btn btn-primary">Order!</button>
        </form>

        <?php
        if (!empty($_POST)) {
            handleForm($products);
        }
        ?>

        <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in fake services.</footer>
    </div>

    <style>
        footer {
            text-align: center;
        }
    </style>
</body>

</html>