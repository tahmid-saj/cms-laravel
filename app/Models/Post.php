<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // In case table and primary key names are different than database
    // protected $table = 'posts';
    // protected $primaryKey = 'post_id';

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'title',
        'content',
    ];

    
}
