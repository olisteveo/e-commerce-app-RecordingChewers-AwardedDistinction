<?php
namespace App\Services;

use Illuminate\Http\Request;

class ImageUpload
{

    public static function handle(Request $request, $input_name, $storage_path, $default_file_name="no=image.jpg") {
        if(!$request->hasFile($input_name)) {
            return $default_file_name;
        }
        // handle file upload
        // get file name with the extension
        $fileNameWithExt = $request->file($input_name)->getClientOriginalName();
        // get just filename
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // get just ext
        $extension = $request->file($input_name)->getClientOriginalExtension();
        // file name to store with a timestamp
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //dd($fileNameToStore);
        // upload the image
        $path = $request->file($input_name)->storeAs("public/{$storage_path}", $fileNameToStore);
        return $fileNameToStore;
    }



}
