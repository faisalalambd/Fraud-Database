<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumbersModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'phone_numbers';

    protected $primaryKey = 'phone_number_id';
}
