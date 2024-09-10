<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasFactory ,HasTranslations;
    protected $fillable = ['entity_id', 'name', 'value'];
    protected $translatable = ['entity_id', 'name', 'value'];

    public function entities()
    {
        return $this->belongsToMany(Entity::class, 'entity_attribute_values')
            ->withPivot('value')
            ->withTimestamps();
    }
}
