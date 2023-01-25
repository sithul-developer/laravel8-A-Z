<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'brands_name',
        'brands_image',
        'status',
        'created_at',
        'updated_at'
       ];


}
