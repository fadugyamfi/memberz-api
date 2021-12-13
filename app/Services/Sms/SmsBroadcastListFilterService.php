<?php

namespace App\Services\Sms;

use App\Models\OrganisationGroup;
use App\Models\OrganisationGroupType;
use App\Models\OrganisationMemberCategory;

class SmsBroadcastListFilterService {


    // public function getFilters() {
    //     return [
    //         'groups' => $this->getFields()
    //     ];
    // }

    public function getFilters(): array {
        return [
            [
                "name" => "Membership Profile",
                "fields" => [
                    [
                        'id' => 'membership__category',
                        'name' => "Membership Category",
                        "table" => "organisation_members",
                        "column" => "organisation_member_category_id",
                        "value_type" => "option",
                        "conditions" => $this->getListConditions(),
                        "options" => OrganisationMemberCategory::select('id', 'name')->orderBy('name')->get()->map(function($category) {
                            return ['label' => $category->name, 'value' => $category->id];
                        })
                    ],
                    [
                        'id' => 'membership__no',
                        'name' => "Membership No.",
                        "table" => "organisation_members",
                        "column" => "organisation_no",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__first_name',
                        'name' => "Member First Name",
                        "table" => "members",
                        "column" => "first_name",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__last_name',
                        'name' => "Member Last Name",
                        "table" => "members",
                        "column" => "last_name",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__full_name',
                        'name' => "Member Full Name",
                        "table" => "members",
                        "column" => "CONCAT(members.first_name, ' ', members.last_name)",
                        "raw" => true,
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__gender',
                        'name' => "Gender",
                        "table" => "members",
                        "column" => "gender",
                        "options" => [
                            ["label" => "Male", "value" => "male"],
                            ["label" => "Female", "value" => "female"]
                        ],
                        "value_type" => "option",
                        "conditions" => $this->getListConditions()
                    ],
                    [
                        'id' => 'members__dob',
                        'name' => "Date Of Birth",
                        "table" => "members",
                        "column" => "dob",
                        "value_type" => "date",
                        "conditions" => $this->getDateConditions()
                    ],
                    [
                        'id' => 'members__age',
                        'name' => "Age",
                        "table" => "members",
                        "column" => "dob",
                        "value_type" => "number",
                        "conditions" => $this->getNumberConditions()
                    ],
                    [
                        'id' => 'members__birth_month',
                        'name' => "Birth Month",
                        "table" => "members",
                        "column" => "MONTHNAME(members.dob)",
                        "raw" => true,
                        "value_type" => "option",
                        "conditions" => $this->getListConditions(),
                        "options" => $this->getMonthOptions()
                    ],
                    [
                        'id' => 'members__birth_day_of_week',
                        'name' => "Birth Day Of Week",
                        "table" => "members",
                        "column" => "DAYNAME(members.dob)",
                        "raw" => true,
                        "value_type" => "option",
                        "conditions" => $this->getListConditions(),
                        "options" => $this->getDayOfWeekOptions()
                    ],
                    [
                        'id' => 'members__mobile_number',
                        'name' => "Mobile Number",
                        "table" => "members",
                        "column" => "mobile_number",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__email',
                        'name' => "Email",
                        "table" => "members",
                        "column" => "email",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__occupation',
                        'name' => "Occupation",
                        "table" => "members",
                        "column" => "occupation",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                    [
                        'id' => 'members__business_name',
                        'name' => "Place of Work",
                        "table" => "members",
                        "column" => "business_name",
                        "value_type" => "text",
                        "conditions" => $this->getTextConditions()
                    ],
                ]
            ],
            [
                'name' => 'Membership Groups',
                'fields' => $this->getGroupFields()
            ]
        ];
    }

    public function getTextConditions() {
        return [
            ['label' => 'Equals', 'value' => '='],
            ['label' => 'Not Equal To', 'value' => '!='],
            ['label' => 'Contains', 'value' => '%{s}%'],
            ['label' => 'Starts With', 'value' => '{s}%'],
            ['label' => 'Ends With', 'value' => '%{s}'],
        ];
    }

    public function getNumberConditions() {
        return [
            ['label' => 'Equals', 'value' => '='],
            ['label' => 'Not Equal To', 'value' => '!='],
            ['label' => 'Contains', 'value' => '%{s}%'],
            ['label' => 'Starts With', 'value' => '{s}%'],
            ['label' => 'Ends With', 'value' => '%{s}'],
            ['label' => 'Greater Than', 'value' => '>'],
            ['label' => 'Greater Than or Equals', 'value' => '>='],
            ['label' => 'Less Than', 'value' => '<'],
            ['label' => 'Less Than or Equals', 'value' => '<='],
        ];
    }

    public function getListConditions() {
        return [
            ['label' => 'Equals', 'value' => '='],
            ['label' => 'Not Equal To', 'value' => '!=']
        ];
    }

    public function getDateConditions() {
        return [
            ['label' => 'Equals', 'value' => '='],
            ['label' => 'Not Equal To', 'value' => '!='],
            ['label' => 'Greater Than', 'value' => '>'],
            ['label' => 'Greater Than or Equals', 'value' => '>='],
            ['label' => 'Less Than', 'value' => '<'],
            ['label' => 'Less Than or Equals', 'value' => '<='],
        ];
    }

    public function getMonthOptions() {
        return [
            ['label' => 'January', 'value' => 'January'],
            ['label' => 'February', 'value' => 'Febraury'],
            ['label' => 'March', 'value' => 'March'],
            ['label' => 'April', 'value' => 'April'],
            ['label' => 'May', 'value' => 'May'],
            ['label' => 'June', 'value' => 'June'],
            ['label' => 'July', 'value' => 'July'],
            ['label' => 'August', 'value' => 'August'],
            ['label' => 'September', 'value' => 'September'],
            ['label' => 'October', 'value' => 'October'],
            ['label' => 'November', 'value' => 'November'],
            ['label' => 'December', 'value' => 'December'],
        ];
    }

    public function getDayOfWeekOptions() {
        return [
            ['label' => 'Sunday', 'value' => 'Sunday'],
            ['label' => 'Monday', 'value' => 'Monday'],
            ['label' => 'Tuesday', 'value' => 'Tuesday'],
            ['label' => 'Wednesday', 'value' => 'Wednesday'],
            ['label' => 'Thursday', 'value' => 'Thursday'],
            ['label' => 'Friday', 'value' => 'Friday'],
            ['label' => 'Saturday', 'value' => 'Saturday']
        ];
    }

    public function getGroupFields() {
        $fields = [];
        $groupTypes = OrganisationGroupType::with('organisationGroups')->get();

        foreach($groupTypes as $type) {
            $field = [
                'id' => "membership__group_{$type->id}",
                "organisation_group_type_id" => $type->id,
                'name' => $type->name,
                "table" => "organisation_member_groups",
                "column" => "organisation_group_id",
                "value_type" => "option",
                "conditions" => $this->getListConditions(),
                "options" => $type->organisationGroups->map(function($group) {
                    return ['label' => $group->name, 'value' => $group->id];
                })
            ];

            array_push($fields, $field);
        }

        return $fields;
    }
}
