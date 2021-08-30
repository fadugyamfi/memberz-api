<?php

namespace App\Http\Requests;

use LaravelApiBase\Http\Requests\ApiRequest;

/**
 * @bodyParam member_id number required Id of member. Example: 1
 * @bodyParam name string required Name of member relation. Example: Joseph Ansah
 * @bodyParam gender string required Gender of member relation. Example: Male
 * @bodyParam dob string required Date of birth of member relation. Example: 1990-01-04
 * @bodyParam is_alive boolean  Member relation alive or dead. Example: 1
 * @bodyParam active boolean Member relation active or inactive. Example: 1
 * @bodyParam relation_member_id number Linked to member id of members table. Example: 1
 * @bodyParam member_relation_type_id number required Id of member relation type. Example: 1
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
            'relation_member_id' => 'nullable|number|exists:members,id',
            'active' => 'nullable|boolean',
            'member_relation_type_id' => 'number|required|exists:member_relation_types',
        ];
    }
}
