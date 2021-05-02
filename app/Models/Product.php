<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string description
 * @property string picture
 * @property float price
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Product extends Model
{
    use HasFactory;
}
