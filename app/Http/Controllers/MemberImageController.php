<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberImageRequest;
use App\Models\MemberImage;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;
use Intervention\Image\Facades\Image;

class MemberImageController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(MemberImage $image)
    {
        $this->setApiModel($image);
    }

    public function store(MemberImageRequest $request)
    {
        $path = $request->file('image')->store('images/profiles');
        $thumbFileName = rand(100000, 999999);
        $thumbPath = "images/profiles/thumbnails/{$thumbFileName}.jpg";
        Image::make($path)->resize(300, 300)->save($thumbPath);

        $request->merge([
            'file_path' => $path,
            'thumb_path' => $thumbPath
        ]);

        return $this->apiStore($request);
    }

    public function update(MemberImageRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
