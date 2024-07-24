<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artistprofile;
use App\Models\Role;

class ArtistController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title'=>'required',
        //     'description'=>'required',
        //     'cooking_method'=>'required',
        //     'prep_time'=>'required',
        //     'serves'=>'required',
        //     'image'=>'image|nullable|max:1999',

        // ]);
        // handle file upload
        if($request->hasFile('song_sample')){
            // get file name with the extension
            $fileNameWithExt = $request->file('song_sample')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('song_sample')->getClientOriginalExtension();
            // file name to store with a timestamp
            $songSampleToStore = $fileName.'_'.time().'.'.$extension;
            //dd($fileNameToStore);
            // upload the sample
            $path = $request->file('song_sample')->storeAs('public/storage/song_sample', $songSampleToStore);
        } else{
            $songSampleToStore = NULL;
        }

        if($request->hasFile('profile_pic')){
            // get file name with the extension
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            // file name to store with a timestamp
            $profilePicToStore = $fileName.'_'.time().'.'.$extension;
            // upload the profile pic
            $path = $request->file('profile_pic')->storeAs('public/storage/profile_pics', $profilePicToStore);
        } else{
            $profilePicToStore = 'noimage.jpg';
        }

        if($request->hasFile('song_art')){
            // get file name with the extension
            $fileNameWithExt = $request->file('song_art')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just ext
            $extension = $request->file('song_art')->getClientOriginalExtension();
            // file name to store with a timestamp
            $songArtToStore = $fileName.'_'.time().'.'.$extension;
            //dd($fileNameToStore);
            // upload the image
            $path = $request->file('song_art')->storeAs('public/storage/song_art', $songArtToStore);
        } else{
            $songArtToStore = 'noimage.jpg';
        }
        $user = auth()->user();
        $artist = new Artistprofile;
        $artist->name = $request->input('name');
        $artist->profile_pic = $profilePicToStore;
        $artist->description = $request->input('description');
        $artist->song_sample = $songSampleToStore;
        $artist->song_sample_name = $request->input('song_sample_name');
        $artist->song_sample_comments = $request->input('sample_comments');
        $artist->song_art = $songArtToStore;
        $artist->user_id = $user->id;
        $artist->save();
        $user->roles_id = Role::ARTIST_ROLE;
        $user->save();
        return redirect(route("artists"));
    }

}
