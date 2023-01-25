<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
         'user_id',
         'category_name',
         'status',
         'created_at',
         'updated_at',
         'deleted_at'

        ];
        public function user()
        {
            return $this->hasOne(User::class, 'id', 'user_id');
        }


}
