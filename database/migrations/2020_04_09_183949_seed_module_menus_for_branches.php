<?php

use App\Models\Module;
use App\Models\ModuleMenu;
use App\Models\Organisation;
use App\Models\OrganisationModule;
use App\Models\OrganisationRole;
use App\Models\OrganisationRoleModule;
use Illuminate\Database\Migrations\Migration;

class SeedModuleMenusForBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = $this->createModule();
        $module_menu_ids = $this->createModuleMenus($module);

        $this->assignModuleToOrganisations($module);
        $this->assignModuleToRoles($module, $module_menu_ids);

        $this->updateMenuPositions();
    }

    public function createModule()
    {
        return Module::firstOrCreate(['name' => 'Branches'], [
            'name' => 'Branches',
            'description' => 'Branch Management',
            'controller' => 'organisation_branches',
            'action' => 'index',
            'icon' => 'fa-list-alt',
            'default_active' => 1,
            'add_to_menu' => 1,
            'menu_position' => 1
        ]);
    }

    public function createModuleMenus($module)
    {
        $menu1 = ModuleMenu::firstOrCreate([
            'module_id' => $module->id,
            'display_name' => 'Branches List',
        ], [
            'module_id' => $module->id,
            'display_name' => 'Branches List',
            'controller' => 'organisation_branches',
            'action' => 'index',
            'icon' => 'fa-list-alt',
            'position' => 1,
            'active' => 1,
        ]);

        $menu2 = ModuleMenu::firstOrCreate([
            'module_id' => $module->id,
            'display_name' => 'Branch Contacts',
        ], [
            'module_id' => $module->id,
            'display_name' => 'Branch Contacts',
            'controller' => 'organisation_branch_contacts',
            'action' => 'index',
            'icon' => 'fa-users',
            'position' => 1,
            'active' => 1,
        ]);

        return [$menu1->id, $menu2->id];
    }

    public function assignModuleToOrganisations($module)
    {
        Organisation::select('id')->chunk(25, function ($organisations) use ($module) {
            foreach ($organisations as $organisation) {
                OrganisationModule::firstOrCreate([
                    'organisation_id' => $organisation->id,
                    'module_id' => $module->id,
                ], [
                    'active' => 1,
                ]);
            }
        });
    }

    public function assignModuleToRoles($module, $module_menu_ids)
    {
        OrganisationRole::select('id')->chunk(25, function ($organisation_roles) use ($module, $module_menu_ids) {
            foreach ($organisation_roles as $organisation_role) {
                OrganisationRoleModule::firstOrCreate([
                    'organisation_role_id' => $organisation_role->id,
                    'module_id' => $module->id,
                ], [
                    'module_menu_ids' => implode(',', $module_menu_ids),
                    'active' => 1,
                ]);
            }
        });
    }

    private function updateMenuPositions() {
        Module::where('name', 'Members')->update(['menu_position' => 2]);
        Module::where('name', 'Messages')->update(['menu_position' => 3]);
        Module::where('name', 'Events')->update(['menu_position' => 4]);
        Module::where('name', 'Finance')->update(['menu_position' => 5]);
        Module::where('name', 'Settings')->update(['menu_position' => 6]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $module = Module::where('name', 'Branches')->first();

        if ($module) {
            OrganisationRoleModule::where('module_id', $module->id)->delete();
            OrganisationModule::where('module_id', $module->id)->delete();
            ModuleMenu::where('module_id', $module->id)->delete();

            $module->delete();
        }
    }
}
