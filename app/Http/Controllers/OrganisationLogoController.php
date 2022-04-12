<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberImageRequest;
use App\Http\Requests\OrganisationLogoRequest;
use App\Models\MemberImage;
use App\Models\Organisation;
use App\Services\OrganisationLogoUploadService;
use App\Services\ProfileImageUploadService;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisations
 */
class OrganisationLogoController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Organisation $organisation)
    {
        $this->setApiModel($organisation);
    }

    public function update(OrganisationLogoRequest $request, $id, OrganisationLogoUploadService $uploadService)
    {
        try {
            $paths = $uploadService->handle($request);

            $request->merge([
                'logo' => url($paths['imagePath'])
            ]);

            return $this->apiUpdate($request, $id);
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
