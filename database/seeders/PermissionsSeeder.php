<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'edit p_offer']);
        Permission::create(['name' => 'edit l_offer']);
        Permission::create(['name' => 'manage product']);

        // create roles and assign existing permissions
        $sales = Role::create(['name' => 'sales']);
        $sales->givePermissionTo('create order');
        $sales->givePermissionTo('edit order');

        $procurment = Role::create(['name' => 'procurment']);
        $procurment->givePermissionTo('edit p_offer');
        $procurment->givePermissionTo('manage product');

        $logistic = Role::create(['name' => 'logistic']);
        $logistic->givePermissionTo('edit l_offer');

        
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $admin = Role::create(['name' => 'super-admin']);
        
        $users = [
            [
                'fname_en' => "Misha",
                'fname' => "მიშა",
                'lname_en' => "Chekhashvili",
                'lname' => "ჭეხაშვილი",
                'email' => "m.chekhashvili@gmail.com",
                'role' => 'super-admin',
                'department' => 'პროგრამული უზრუნველყოფის დეპარტამენტი',
                'password' => Hash::make('12345678'),
            ],
            [
                'fname_en' => "Tatia",
                'fname' => "თათია",
                'lname_en' => "Partsvania",
                'lname' => "ფარცვანია",
                'email' => "t.partsvania@gmail.com",
                'role' => "sales",
                'department' => 'გაყიდვების დეპარტამენტი',
                'password' => Hash::make('12345678'),
            ],
            [
                'fname_en' => "Ana",
                'fname' => "ანა",
                'lname_en' => "Gelashvili",
                'lname' => "გელაშვილი",
                'role' => "procurment",
                'department' => 'შესყიდვების დეპარტამენტი',
                'email' => "a.gelashvili@gmail.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'fname_en' => "Nino",
                'fname' => "ნინო",
                'lname_en' => "Iarajuli",
                'lname' => "იარაჯული",
                'role' => "logistic",
                'department' => 'ლოგისტიკის დეპარტამენტი',
                'email' => "n.iarajuli@gmail.com",
                'password' => Hash::make('12345678'),
            ],
        ];

        // Loop Through Users
        foreach($users as $key => $user){
            // Create User Accounts
            $account = User::factory()->create($user);
            // Assign Roles By Departments
            $account->assignRole($user["role"]);

        }
    }
}
