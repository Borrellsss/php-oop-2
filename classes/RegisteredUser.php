<?php

require_once __DIR__ . "/User.php";

class RegisteredUser extends User {
    // !OVERRIDE
    protected $discount = 0.20;
}
?>