<?php

namespace App\Controllers;

use App\View;

class ProductsCartController
{
    public function cart(): View
    {

        return new View('Products/cart');
    }

}