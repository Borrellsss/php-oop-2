<?php
require_once __DIR__ . "/../traits/ProductCode.php";

class AnimalProduct {
    // *TRAITS
    use ProductCode;

    public $type;
    public $animal;
    public $brand;
    public $size;
    public $price;

    // *FUNCTIONS
    public function __construct($_type, $_animal, $_price) {
        $this->type = $_type;
        $this->animal = $_animal;
        $this->price = $_price;
    }
}
?>