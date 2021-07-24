<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawCompany extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'address', 'phone_number', 'website', 'type', 'rating', 'total_reviews', 'business_hours',
                            'latitude', 'longitude'];


}
