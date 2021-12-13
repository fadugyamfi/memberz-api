<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberImageRequest;
use App\Models\MemberImage;
use App\Services\ProfileImageUploadService;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Member Images
 */
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

    public function store(MemberImageRequest $request, ProfileImageUploadService $uploadService)
    {
        try {
            $paths = $uploadService->handle($request);

            $request->merge([
                'file_path' => $paths['imagePath'],
                'thumb_path' => $paths['thumbnailPath'],
                'file_name' => $paths['filenametostore']
            ]);

            return $this->apiStore($request);
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(MemberImageRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
