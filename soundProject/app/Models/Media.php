<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = "media";
    protected $primaryKey = "id";

    protected $fillable = ['mediaName', 'mediaTypeId', 'mediaPhoto', 'mediaURL', 'extension', 'artist_id', 'lyricist_id'];
    
    //adding relation
    public function mediaType()
    {
        return $this->belongsTo(MediaType::class, 'mediaTypeId');
    }

    public function artist()
    {
        return $this->belongsTo(Artists::class, 'artist_id');
    }

    public function lyricist()
    {
        return $this->belongsTo(Lyricists::class, 'lyricist_id');
    }

    //for rating calculation 
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
