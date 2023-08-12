<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    use HasFactory;
    protected $table = "media_type";
    protected $primaryKey = "id";

    //mediatype can has my   media(tracks)
    public function media()
    {
        return $this->hasMany(Media::class, 'mediaTypeId');
    }
    
}
