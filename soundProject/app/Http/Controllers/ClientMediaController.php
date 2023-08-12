<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Rating;
use Illuminate\Http\Request;

class ClientMediaController extends Controller
{

    //______________________ Rating _______________________
    //___ Audio By Ajax _____________
    //for Audio player
    public function getAudios()
    {
        $audios = Media::where('mediaTypeId', 1)
            ->with('artist', 'lyricist') // Include the artist and lyricist data
            ->get();

        //___ after adding rating relation in  Model ____
        //count averg rating of product
        foreach ($audios as $audio) {
            $averageRating = $audio->ratings->avg('rating');
            //___ adding  runtime colum or peropter in  Media Model  _____
            $audio->averageRating = round($averageRating, 2);
            //you will get  averageRating in  ajax
        }
        return response()->json($audios);
    }
    
    public function submitRating(Request $request)
    {
        $videoId = $request->input('id');
        $ratingValue = $request->input('rating');
        $user = session()->get('user');

        if ($user == null) {
            return response()->json(['message' => 'You need to login']);
        }

        Rating::updateOrCreate(
            ['user_id' => $user->id, 'media_id' => $videoId],
            ['rating' => $ratingValue]
        );

        $audios = Media::where('mediaTypeId', 1)
            ->with('artist', 'lyricist', 'ratings') 
            ->get();

        foreach ($audios as $audio) {
            $averageRating = $audio->ratings->avg('rating');
            $audio->averageRating = round($averageRating, 2);
        }

        return response()->json($audios);
    }

    //______________________ ClientMedia List (mediaType) _______________________
    public function clientMediaList($mediaId)
    {
        $medias = Media::where('mediaTypeId', $mediaId)
            ->with('artist', 'lyricist') // Include the artist and lyricist data
            ->get();

        //___ after adding rating relation in  Model ____
        //count averg rating of product
        foreach ($medias as $media) {
            $averageRating = $media->ratings->avg('rating');
            //___ adding  runtime colum or peropter in  Media Model  _____
            $media->averageRating = round($averageRating, 2);
            //you will get  averageRating in  ajax
        }
        return View('client.media.list',compact('medias','mediaId'));
    }

    //______________________ ClientClient Singe (mediaType) _______________________
    public function clientMediaSingle($id,$mediaId){
        $medias = Media::where(['mediaTypeId'=> $mediaId , 'id'=>$id])
            ->with('artist', 'lyricist', 'ratings') 
            ->get();

        foreach ($medias as $media) {
            $averageRating = $media->ratings->avg('rating');
            $media->averageRating = round($averageRating, 2);
        }
        return View('client.media.single',compact('media','mediaId'));
    }
    
}
