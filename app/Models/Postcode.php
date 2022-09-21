<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $postcode
 * @property float $latitude
 * @property float $longitude
 */
class Postcode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'postcode';
}
