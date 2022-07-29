<?php
class PrePaidCard {
    public $user;
    public $cardCode;
    public $cvv;
    public $expirationDate;
    public $availableBalance = 0;

    // *FUNCTIONS
    public function __construct($_user, $_cardCode, $_cvv, $_expirationDate) {
        $this->user = $_user;
        $this->cardCode = $_cardCode;
        $this->cvv = $_cvv;
        $this->expirationDate = $_expirationDate;
    }
}
?>