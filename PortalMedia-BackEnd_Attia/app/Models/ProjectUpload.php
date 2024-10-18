<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUpload extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Specify 'id' as the primary key

    protected $fillable = [
        'project_id',
        'project_data',
    ];

    public $timestamps = false;

    // By default, Laravel assumes your primary key is an auto-incrementing integer, 
    // so you don't need to specify it unless it's different.
}
