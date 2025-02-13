<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private $id;
    private $company_id;
    private $name;
    private $price;
    private $description;
    private $image;

}
