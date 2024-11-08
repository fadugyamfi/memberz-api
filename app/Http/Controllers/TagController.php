<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Tags
 */
class TagController extends Controller
{
    use ApiControllerBehavior;

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
}
