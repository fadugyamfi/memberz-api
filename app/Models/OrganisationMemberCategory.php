<?php

namespace App\Models;


use Torzer\Awesome\Landlord\BelongsToTenants;
class OrganisationMemberCategory extends ApiModel
{
    use BelongsToTenants;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organisation_member_categories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'parent_id', 'lft', 'rght', 'name', 'slug', 'description', 'auto_gen_ids', 'id_prefix', 'id_suffix', 'id_next_increment', 'default', 'organisation_member_count', 'rank', 'paid_membership', 'payment_required', 'price', 'registration_fee', 'renewal_frequency', 'publicly_joinable', 'created', 'modified', 'active'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['auto_gen_ids' => 'boolean', 'paid_membership' => 'boolean', 'payment_required' => 'boolean', 'publicly_joinable' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created', 'modified'];

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function organisationMember() {
        return $this->hasMany(OrganisationMember::class);
    }

    /**
     * Create the default membership category for adding records to the database
     */
    public static function createDefault(Organisation $organisation) {
        return self::firstOrCreate(
            ['organisation_id' => $organisation->id],
            [
                'name' => 'General Members',
                'description' => 'General category for new memberships',
                'slug' => 'general-members',
                'auto_gen_ids' => 1,
                'id_prefix' => '',
                'id_next_increment' => 1,
                'id_suffix' => '',
                'default' => 1,
                'rank' => 1,
                'renewal_frequency' => 'Never',
                'publicly_joinable' => 1,
                'active' => 1
            ]
        );
    }
}
