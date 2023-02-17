<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $roles = ['Portiere', 'Difensore Centrale', 'Terzino Destro', 'Terzino Sinistro', 'Centrocampista', 'Esterno Destro', 'Esterno Sinistro', 'Punta', 'Attacante Sinistro', 'Attacante Destro']; 
        
        foreach($roles as $role)
        {
            $new_role = new Role();
            $new_role->name = $role;
            $new_role->slug = Str::slug($new_role->name);
            $new_role->save();
        }

    }
}