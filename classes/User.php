<?php
class User {
    public $name;
    public $lastName;
    public $email;
    protected $products = [];
    protected $discount = 0;
    protected $finalPrice = 0;
    

    // *FUNCTIONS
    public function __construct($_name, $_lastName, $_email) {
        $this->name = $_name;
        $this->lastName = $_lastName;
        $this->email = $_email;
    }
    public function addProduct($product) {
        $this->products[] = $product;
    }
    public function calcPrice() {
        $sum = 0;
        foreach($this->products as $product) {
            $sum += $product->price;
        }
        return $sum;
    }
    public function getFinalPrice() {
        $this->finalPrice = $this->calcPrice();
        return $this->finalPrice -= $this->finalPrice * $this->discount;
    }
    public function payAction($card) {
        if($card->availableBalance >= $this->getFinalPrice()) {
            return true;
        } else {
            throw new Exception("<span style='color: red;'>Transazione non riuscita, controlla il saldo e ritenta.</span>");
        }
    }
    public function getDiscount() {
        return $this->discount;
    }
    public function getProducts() {
        return $this->products;
    }
}
?>
