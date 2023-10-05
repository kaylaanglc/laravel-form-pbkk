<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $table = 'reviewers'; // Specify the table name if it's different from the model name
    protected $fillable = ['name', 'email', 'phone', 'product', 'image', 'rating'];

    // Define any relationships or additional methods here if needed
}
