<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index(){
         $videos = Media::where('mediaTypeId', 2)    
               ->with('artist', 'lyricist') // Include the artist and lyricist data
               ->take(4)
               ->get();

        //___ after adding rating relation in  Model ____
        //count averg rating of product
        foreach ($videos as $video) {
            $averageRating = $video->ratings->avg('rating');
            //___ adding  runtime colum or peropter in  Media Model  _____
            $video->averageRating = round($averageRating, 2);
        }
        return View('client.index' , compact('videos'));
    }

   
    
}
