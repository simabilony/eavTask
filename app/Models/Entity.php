<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Entity extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = ['name', 'description', 'price'];
    public $translatable = ['name', 'description']; // الحقول القابلة للترجمة
    public function attributes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, 'entity_attribute_values')
            ->withPivot('value')
            ->withTimestamps();
    }
}
