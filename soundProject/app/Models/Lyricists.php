<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyricists extends Model
{
    use HasFactory;
    protected $table = "lyricists";
    protected $primaryKey = "id";

    public function media()
    {
        return $this->hasMany(Media::class, 'lyricist_id');
    }
}
