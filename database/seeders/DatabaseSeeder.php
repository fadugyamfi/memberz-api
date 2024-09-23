<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // $this->call(UsersTableSeeder::class);
        $this->call(AuthAppsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(NotificationTypesTableSeeder::class);
        $this->call(OrganisationTypesTableSeeder::class);
        $this->call(OrganisationSettingTypesTableSeeder::class);
        $this->call(MemberCategorySettingsTableSeeder::class);
        $this->call(ModuleContributionPaymentTypesTableSeeder::class);
        $this->call(ModuleContributionReportFiltersTableSeeder::class);
        $this->call(ModuleContributionReportsTableSeeder::class);
        $this->call(ModuleContributionReportParametersTableSeeder::class);
        $this->call(ModuleMenusTableSeeder::class);
        $this->call(PaymentTypesTableSeeder::class);
        $this->call(PaymentPlatformsTableSeeder::class);
        $this->call(SettingTypesTableSeeder::class);
        $this->call(SubscriptionTypesTableSeeder::class);
        $this->call(SystemSettingCategoriesTableSeeder::class);
        $this->call(SystemSettingsTableSeeder::class);
        $this->call(TransactionTypesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(MemberRelationTypesSeeder::class);
        
        Schema::enableForeignKeyConstraints();
    }
}
