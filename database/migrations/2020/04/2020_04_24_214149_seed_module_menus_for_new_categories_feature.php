<?php

use App\Models\Module;
use App\Models\ModuleMenu;
use App\Models\OrganisationModule;
use App\Models\OrganisationRoleModule;
use Illuminate\Database\Migrations\Migration;

class SeedModuleMenusForNewCategoriesFeature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = Module::where('name', 'Members')->first();
        $this->createModuleMenus($module);
        $this->updateModuleMenuIDs($module);
        $this->updateModuleMenus($module);

        Module::where('name', 'Events')->update(['active' => 0]);
    }

    public function createModuleMenus($module)
    {
        ModuleMenu::firstOrCreate([
            'module_id' => $module->id,
            'display_name' => 'Membership Categories',
        ], [
            'module_id' => $module->id,
            'display_name' => 'Membership Categories',
            'controller' => 'organisation_member_categories',
            'action' => 'index',
            'icon' => 'fa-list-alt',
            'position' => 1,
            'active' => 1,
        ]);

        ModuleMenu::firstOrCreate([
            'module_id' => $module->id,
            'display_name' => 'Sub Groups / Departments',
        ], [
            'module_id' => $module->id,
            'display_name' => 'Sub Groups / Departments',
            'controller' => 'organisation_groups',
            'action' => 'index',
            'icon' => 'fa-group',
            'position' => 3,
            'active' => 1,
        ]);
    }

    private function updateModuleMenuIDs($module)
    {
        $module_menu_ids = ModuleMenu::where('module_id', $module->id)
            ->where('active', 1)
            ->get()
            ->pluck('id')
            ->all();

        OrganisationRoleModule::where('module_id', $module->id)
            ->update(['module_menu_ids' => implode(',', $module_menu_ids)]);
    }

    private function updateModuleMenus($module)
    {
        $module->controller = 'organisation_members';
        $module->action = "index";
        $module->save();

        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Profiles')->update([
            'display_name' => 'Manage Profiles',
            'position' => 2,
            'controller' => 'organisation_members',
            'action' => 'index'
        ]);

        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Photos')->update(['position' => 4, 'active' => 0]);
        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Bulk Import')->update(['position' => 5, 'active' => 0]);
        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Reports')->update(['position' => 6]);
    }

    private function revertModuleMenus($module) {
        $module->controller = 'organisation';
        $module->action = "members";
        $module->save();

        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Manage Profiles')->update([
            'display_name' => 'Profiles',
            'position' => 2,
            'controller' => 'organisation',
            'action' => 'members'
        ]);

        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Photos')->update(['position' => 3, 'active' => 1]);
        ModuleMenu::where('module_id', $module->id)->where('display_name', 'Bulk Import')->update(['position' => 4, 'active' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Module::where('name', 'Events')->update(['active' => 1]);

        $module = Module::where('name', 'Members')->first();
        ModuleMenu::where('display_name', 'Membership Categories')->delete();
        ModuleMenu::where('display_name', 'Sub Groups / Departments')->delete();

        $this->updateModuleMenuIDs($module);
        $this->revertModuleMenus($module);
    }
}
