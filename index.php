<?php
// L'e-commerce vende prodotti per gli animali.
// I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
// L'utente potrà sia comprare i prodotti senza registrarsi, oppure
// iscriversi e ricevere il 20% di sconto su tutti i prodotti.

require_once __DIR__ . "../classes/PetBed.php";
require_once __DIR__ . "../classes/PetFood.php";
require_once __DIR__ . "../classes/PetToy.php";
require_once __DIR__ . "../classes/AnonymousUser.php";
require_once __DIR__ . "../classes/RegisteredUser.php";

// *pet beds
$firstPetBed = new PetBed("pet bed", "cat", 14);
$firstPetBed->size = "s";

// *pet foods
$firstPetFood = new PetFood("croquettes", "cat", 40);
$firstPetFood->brand = "Royal Canin";
$firstPetFood->size = 10;

$secondPetFood = new PetFood("croquettes", "cat", 24);
$secondPetFood->brand = "Trainer";
$secondPetFood->size = 4;

$thirdPetFood = new PetFood("gravy", "cat", 3);
$thirdPetFood->brand = "Royal Canin";
$thirdPetFood->size = 0.3;

// *pet toys
$firstPetToy = new PetToy("ball", "cat", 1);
$firstPetToy->size = "xs";

$secondPetToy = new PetToy("stick", "cat", 5.50);
$secondPetToy->size = "m";

// *anonymous users
$firstAnonymousUser = new AnonymousUser("Marco", "Rossi", "marcorossi@gmail.com");
$firstAnonymousUser->addProduct($firstPetBed);
$firstAnonymousUser->addProduct($firstPetFood);
$firstAnonymousUser->addProduct($thirdPetFood);
$firstAnonymousUser->addProduct($firstPetToy);

// *registered users
$firstRegisteredUser = new RegisteredUser("Laura", "Bianchi", "laurabianchi@gmail.com");
$firstRegisteredUser->addProduct($firstPetFood);
$firstRegisteredUser->addProduct($secondPetFood);
$firstRegisteredUser->addProduct($secondPetToy);

// !DEBUG
// var_dump($firstAnonymousUser->getProducts());
// var_dump($firstAnonymousUser->getDiscount());
// var_dump($firstAnonymousUser->calcPrice());
// var_dump($firstAnonymousUser->getFinalPrice());
// var_dump($firstRegisteredUser->getProducts());
// var_dump($firstRegisteredUser->getDiscount());
// var_dump($firstRegisteredUser->calcPrice());
// var_dump($firstRegisteredUser->getFinalPrice());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-oop-2</title>
</head>
<body style="font-family: sans-serif;">
<div style="margin-top: 2rem;">
        <strong style="color: green;">Anonymous User:</strong>
        <h2 style="margin-top: 0.3rem;">
            <?php echo $firstAnonymousUser->name; ?>
            Products:
        </h2>
    </div>
    <div style="display: flex; gap: 2rem;">
        <?php foreach($firstAnonymousUser->getProducts() as $product) { ?>
            <div class="card">
                <div>
                    <strong style="color: red;">Product Type:</strong>
                    <?php echo $product->type; ?>
                </div>
                <div>
                    <strong style="color: red;">Product For:</strong>
                    <?php echo $product->animal; ?>
                </div>
                <?php if($product->brand) { ?>
                    <div>
                        <strong style="color: red;">Brand:</strong>
                        <?php echo $product->brand; ?>
                    </div>
                <?php } ?>
                <div>
                    <?php if(is_numeric($product->size)) { ?>
                        <strong style="color: red;">Weight:</strong>
                        <?php echo $product->size . "Kg"; ?> 
                    <?php } else { ?>
                        <strong style="color: red;">Size:</strong>
                        <?php echo $product->size; ?> 
                    <?php } ?>
                </div>
                <div>
                    <strong style="color: red;">Price:</strong>
                    <?php echo $product->price . "€"; ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div style="margin-top: 1rem;">
        <strong style="color: red;">Total:</strong>
        <?php echo $firstAnonymousUser->getFinalPrice() . "€"; ?>
    </div>
           
    <div style="margin-top: 2rem;">
        <strong style="color: green;">Registered User:</strong>
        <h2 style="margin-top: 0.3rem;">
            <?php echo $firstRegisteredUser->name; ?>
            Products:
        </h2>
    </div>
    <div style="display: flex; gap: 2rem;">
        <?php foreach($firstRegisteredUser->getProducts() as $product) { ?>
            <div class="card">
                <div>
                    <strong style="color: red;">Product Type:</strong>
                    <?php echo $product->type; ?>
                </div>
                <div>
                    <strong style="color: red;">Product For:</strong>
                    <?php echo $product->animal; ?>
                </div>
                <?php if($product->brand) { ?>
                    <div>
                        <strong style="color: red;">Brand:</strong>
                        <?php echo $product->brand; ?>
                    </div>
                <?php } ?>
                <div>
                    <?php if(is_numeric($product->size)) { ?>
                        <strong style="color: red;">Weight:</strong>
                        <?php echo $product->size . "Kg"; ?> 
                    <?php } else { ?>
                        <strong style="color: red;">Size:</strong>
                        <?php echo $product->size; ?> 
                    <?php } ?>
                </div>
                <div>
                    <strong style="color: red;">Price:</strong>
                    <?php echo $product->price . "€"; ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div style="margin-top: 1rem;">
        <strong style="color: red;">Total:</strong>
        <?php echo $firstRegisteredUser->getFinalPrice() . "€"; ?>
    </div>
</body>
</html>