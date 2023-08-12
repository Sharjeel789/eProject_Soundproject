<?php

namespace App\Http\Controllers;

use App\Models\Artists;
use App\Models\Lyricists;
use App\Models\Media;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    public function index($id)
    {
        if ($id != null) {
            $mediaType = MediaType::find($id);
            if ($mediaType) {
                $selectedMediaType = $mediaType->Name;
                // dd($selectedMediaType);
                $media = Media::with('mediaType')
                    ->where('mediaTypeId', $id)
                    ->whereHas('mediaType', function ($query) use ($selectedMediaType) {
                        $query->where('name', $selectedMediaType);
                    })
                    ->get();

                $BaseUrl = asset("");

                return view('dashboard.Media.index', compact('media', 'id', 'BaseUrl'));
            } else {
                // Handle the case when an invalid media type ID is provided
                return view('dashboard.Media.index')->with('error', 'Invalid media type ID.');
            }
        }
        return view('dashboard.Media.index');
    }
    public function Insert($id)
    {
        $artists = Artists::get();
        $lyresc = Lyricists::get();
        $mediaType = MediaType::get();
        return view('dashboard.Media.insert', compact('artists', 'lyresc', 'mediaType', 'id'));
    }

    public function InsertPost(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'media' => ($id == 1) ? 'required|mimes:mp3' : 'required|mimes:mav,mp4,mov,avi|max:20480',
            'artist_id' => 'required|exists:artists,id',
            'lyricist_id' => 'required|exists:lyricists,id',
        ], [
            'name.required' => 'The media name field is required.',
            'image.required' => 'Please upload an image file.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image may not be greater than :max kilobytes.',
            'media.required' => 'Please upload a media file.',
            'media.mimes' => 'The media must be a file of type: mp3 (for audio) or mav, mp4, mov, avi (for video).',
            'media.max' => 'The media may not be greater than :max kilobytes.',
            'artist_id.required' => 'Please select an artist.',
            'artist_id.exists' => 'The selected artist is invalid.',
            'lyricist_id.required' => 'Please select a lyricist.',
            'lyricist_id.exists' => 'The selected lyricist is invalid.',
        ]);

        //region this method not uploading Images 
        // // Determine the directory based on the media type
        // $mediaTypeDirectory = ($id == 1) ? 'audio' : 'video';

        // // Store the media file in the appropriate directory
        // $mediaPath = $request->file('media')->store("media/{$mediaTypeDirectory}", 'public');


        // // Store the image file in the 'images' directory
        // $imagePath = $request->file('image')->store('images', 'public');

        #endregion

        // Determine the directory based on the media type
        $mediaTypeDirectory = ($id == 1) ? 'audio' : 'video';

        // ____ Upload Media ____
        $mediaName = "images/noimage.png";
        if ($request->hasFile('media')) {
            $media = $request->file('media');
            $mediaName = time() . "_" . $media->getClientOriginalName();
            $media->move("media/{$mediaTypeDirectory}/", $mediaName);
            $mediaName = "media/{$mediaTypeDirectory}/$mediaName";
        }
        // ____ Upload Image ____
        $imgName = $request->image;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = time() . "_" . $img->getClientOriginalName();
            $img->move("images/Teachers/", $imgName);
            $imgName = "images/Teachers/$imgName";
        }

        $extension = $request->file('media')->getClientOriginalExtension();

        // Create a new Media model and store the data in the database
        $media = new Media([
            'mediaName' => $request->name,
            'mediaTypeId' => $id,
            'mediaPhoto' => $imgName,
            'mediaURL' => $mediaName,
            'extension' => $extension,
            'artist_id' => $request->input('artist_id'),
            'lyricist_id' => $request->input('lyricist_id'),
        ]);

        $media->save();

        // dd($mediaPath);
        // Redirect to a success page or wherever you want to go after successful insertion
        return redirect()->route('dashboard.Media', ['id' => $id])
            ->with('success', 'Media added successfully');
    }

    public function Edit($id,$actionId)
    {
        // Fetch the media by ID
        $media = Media::findOrFail($id);

        // Fetch other data needed for the form
        $artists = Artists::all();
        $lyricists = Lyricists::all();
        $mediaTypes = MediaType::all();

        return view('dashboard.Media.edit', compact('media', 'artists', 'lyricists', 'mediaTypes','actionId'));
    }

    public function editPost(Request $req, $id)
    {
        // Validate the form data
        $req->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'media' => 'nullable|mimes:mp3,wav,mp4,mov,avi|max:20480', // Adjust the allowed media file types and size as needed
            'artist_id' => 'required|exists:artists,id',
            'lyricist_id' => 'required|exists:lyricists,id',
        ]);

        // Find the media record by its ID
        $media = Media::findOrFail($id);

        // Determine the directory based on the media type
        $mediaTypeDirectory = ($media->mediaTypeId == 1) ? 'audio' : 'video';

        // Update the media name and other attributes
        $media->mediaName = $req->input('name');
        $media->artist_id = $req->input('artist_id');
        $media->lyricist_id = $req->input('lyricist_id');

        // Update the image if a new one is provided
        if ($req->hasFile('image')) {
            // Delete the old image file if it exists
            if (file_exists(public_path($media->mediaPhoto))) {
                unlink(public_path($media->mediaPhoto));
            }

            // Upload and save the new image
            $img = $req->file('image');
            $imgName = time() . "_" . $img->getClientOriginalName();
            $img->move("images/Teachers/", $imgName);
            $media->mediaPhoto = "images/Teachers/$imgName";
        }

        // Update the media file if a new one is provided
        if ($req->hasFile('media')) {
            // Delete the old media file if it exists
            if (file_exists(public_path($media->mediaURL))) {
                unlink(public_path($media->mediaURL));
            }

            // Upload and save the new media file
            $mediaFile = $req->file('media');
            $mediaFileName = time() . "_" . $mediaFile->getClientOriginalName();
            $mediaFile->move("media/{$mediaTypeDirectory}/", $mediaFileName);
            $media->mediaURL = "media/{$mediaTypeDirectory}/$mediaFileName";
            $media->extension = $mediaFile->getClientOriginalExtension();
        }

        // Save the updated media record
        $media->update();

        // Redirect to a success page or wherever you want to go after successful update
        return redirect()->route('dashboard.Media',['id'=>$req->actionId]);
    }

    public function Delete($id,$actionId)
    {
        // Fetch the media by ID
        $media = Media::findOrFail($id);
        if (file_exists(public_path($media->mediaPhoto))) {
            unlink(public_path($media->mediaPhoto));
        }
        if (file_exists(public_path($media->mediaURL))) {
            unlink(public_path($media->mediaURL));
        }

        // Perform the delete operation
        $media->delete();

        // Redirect to the desired route with actionId
        return redirect()->route('dashboard.Media', ['id' => $actionId]);
    }

    

}
