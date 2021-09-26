<?php

namespace App\Services;

use App\Http\Requests\MemberImageRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Handles the saving of uploaded profile images either from a Base64 encoded string
 * or from file and creates a thumbnail image along side the original
 */
class ProfileImageUploadService
{

    public function handle(MemberImageRequest $request) {
        if( $request->input('image_base64') ) {
            return $this->handleBase64Image($request);
        }

        return $this->handleFileImage($request);
    }

    private function handleBase64Image(MemberImageRequest $request) {
        $filenametostore = "b64_" . time();
        $imagePath = $this->saveImageFromBase64($request->image_base64, 'profile_images', $filenametostore);
        $thumbnailPath = $this->saveImageFromBase64($request->image_base64, 'profile_images/thumbnail', $filenametostore);
        $this->createThumbnail( public_path($thumbnailPath), 150, 150);

        return compact('imagePath', 'thumbnailPath', 'filenametostore');
    }

    private function handleFileImage(MemberImageRequest $request) {
        // get filename with extension
        $fileNameWithExtension = $request->file('image')->getClientOriginalName();

        // get filename without extension
        $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

        // get file extension
        $extension = $request->file('image')->getClientOriginalExtension();

        // filename to store
        $filenametostore = Str::snake($filename) . '_' . time() . '.' . $extension;

        $request->file('image')->storeAs('public/profile_images', $filenametostore);
        $request->file('image')->storeAs('public/profile_images/thumbnail', $filenametostore);

        //create medium thumbnail
        $thumbnailPath = public_path('storage/profile_images/thumbnail/' . $filenametostore);
        $this->createThumbnail($thumbnailPath, 150, 150);

        $imagePath = 'storage/profile_images/' . $filenametostore;
        $thumbnailPath = 'storage/profile_images/thumbnail/' . $filenametostore;

        return compact('imagePath', 'thumbnailPath', 'filenametostore');
    }

    /**
     * Create a thumbnail of specified size
     *
     * @param string $path path of thumbnail
     * @param int $width
     * @param int $height
     */
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    /**
     * Saves an image to disk from a base64 encoded string
     */
    protected function saveImageFromBase64($param, $folder, $fileName = null) {
        list($extension, $content) = explode(';', $param);
        $tmpExtension = explode('/', $extension);
        preg_match('/.([0-9]+) /', microtime(), $m);
        $fileName = $fileName ? $fileName . ".{$tmpExtension[1]}" : sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
        $content = explode(',', $content)[1];
        $storage = Storage::disk('public');

        $checkDirectory = $storage->exists($folder);

        if (!$checkDirectory) {
            $storage->makeDirectory($folder);
        }

        $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');

        return 'storage/' . $folder . '/' . $fileName;
    }
}
