<?php

namespace App\Http\Requests\Auth;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam member_id number required Id of member
 * @bodyParam name string required Name of member relation
 * @bodyParam gender string required Gender of member relation
 * @bodyParam dob string required Date of birth of member relation
 * @bodyParam is_alive boolean  Member relation alive or dead
 * @bodyParam active boolean Member relation active or inactive
 * @bodyParam member_relation_id Parent id of a member relation
 */
class MemberRelationRequest extends ApiRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'member_id' => 'required|number|exists:members,id',
            'name' => 'required|min:3|max:30|string',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'is_alive' => 'nullable|boolean',
            'member_relation_id' => 'nullable|number|exists:member_relations,id',
            'active' => 'nullable|boolean',
            'relation' => 'required|string|in:children,parent,spouses',
        ];
    }
}
