<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Tags
 */
class TagController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Tag $tag)
    {
        $this->setApiModel($tag);
    }

    /**
     * Get Tag Types
     */
    public function getTypes() {
        $types = Tag::getTypes();

        return response()->json([
            'data' => $types
        ]);
    }

    // add store and update methods below
    public function store(TagRequest $request)
    {
        return $this->apiStore($request);
    }

    public function update(TagRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
