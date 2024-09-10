<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Entity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = Entity::create(['name' => 'Product 1']);

        $attribute1 = Attribute::create(['name' => 'Color', 'type' => 'string']);
        $attribute2 = Attribute::create(['name' => 'Size', 'type' => 'string']);

        $entity->attributes()->attach($attribute1->id, ['value' => 'Red']);
        $entity->attributes()->attach($attribute2->id, ['value' => 'Large']);

        $entity = Entity::create(['name' => 'Product 2']);

        $attribute1 = Attribute::create(['name' => 'Color', 'type' => 'string']);
        $attribute2 = Attribute::create(['name' => 'Size', 'type' => 'string']);

        $entity->attributes()->attach($attribute1->id, ['value' => 'Red']);
        $entity->attributes()->attach($attribute2->id, ['value' => 'Large']);
    }
}
