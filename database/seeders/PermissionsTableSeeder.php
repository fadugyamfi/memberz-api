<?php

use App\Models\OrganisationRole;
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // delete all permissions
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('permissions')->truncate();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::findOrCreate('settings:organisation_roles:view','api');
        Permission::findOrCreate('settings:organisation_roles:manage','api');
        Permission::findOrCreate('settings:organisation_roles:delete','api');
        Permission::findOrCreate('settings:accounts:view','api');
        Permission::findOrCreate('settings:accounts:manage','api');
        Permission::findOrCreate('settings:accounts:delete','api');
        Permission::findOrCreate('settings:profile:view','api');
        Permission::findOrCreate('settings:payment_platforms:view','api');
        Permission::findOrCreate('settings:payment_platforms:manage','api');
        Permission::findOrCreate('settings:payment_platforms:delete','api');
        Permission::findOrCreate('settings:billing:view','api');
        Permission::findOrCreate('settings:billing:manage','api');
        Permission::findOrCreate('settings:billing:delete','api');
        Permission::findOrCreate('settings:subscriptions:view','api');
        Permission::findOrCreate('settings:subscriptions:manage','api');
        Permission::findOrCreate('settings:subscriptions:delete','api');
        Permission::findOrCreate('settings:notifications:weekly_activity_update','api');
        Permission::findOrCreate('settings:notifications:daily_birthday_update','api');

        Permission::findOrCreate('memberships:categories:view','api');
        Permission::findOrCreate('memberships:categories:manage','api');
        Permission::findOrCreate('memberships:categories:delete','api');

        Permission::findOrCreate('memberships:profiles:add','api');
        Permission::findOrCreate('memberships:profiles:edit','api');
        Permission::findOrCreate('memberships:profiles:delete','api');

        Permission::findOrCreate('memberships:registrations:view','api');
        Permission::findOrCreate('memberships:registrations:approve','api');
        Permission::findOrCreate('memberships:registrations:delete','api');

        Permission::findOrCreate('memberships:bulk_upload:view','api');

        Permission::findOrCreate('memberships:reports:view','api');

        Permission::findOrCreate('messaging:settings:view','api');
        Permission::findOrCreate('messaging:history:view','api');
        Permission::findOrCreate('messaging:broadcast:view','api');

        Permission::findOrCreate('finance:dashboard:view','api');
        Permission::findOrCreate('finance:settings:view','api');
        Permission::findOrCreate('finance:income:view','api');
        Permission::findOrCreate('finance:income:manage','api');
        Permission::findOrCreate('finance:income:delete','api');
        Permission::findOrCreate('finance:expenditure:view','api');
        Permission::findOrCreate('finance:expenditure:manage','api');
        Permission::findOrCreate('finance:expenditure:delete','api');
        Permission::findOrCreate('finance:reports:view','api');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // assign permissions to existing roles in the system
        OrganisationRole::chunk(50, function($roles) {
            foreach($roles as $role) {
                $role->givePermissionTo(Permission::all());

                if( !$role->admin_access ) {
                    $role->revokePermissionTo( Permission::where('name', 'like', 'settings:%')->get() );
                }

                if( $role->weekly_activity_update ) {
                    $role->givePermissionTo('settings:notifications:weekly_activity_update');
                }

                if( $role->birthday_update ) {
                    $role->givePermissionTo('settings:notifications:daily_birthday_update');
                }
            }
        });
    }
}
