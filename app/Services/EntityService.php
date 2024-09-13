<?php
namespace App\Services;

use App\Models\Entity;
use App\Models\Attribute;

class EntityService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function createEntity($data)
    {
        $entity = Entity::create(['name' => $data['name']]);

        foreach ($data['attributes'] as $attributeData) {
            $attribute = Attribute::firstOrCreate([
                'name' => $attributeData['name'],
                'type' => $attributeData['type']
            ]);
            $entity->attributes()->attach($attribute->id, ['value' => $attributeData['value']]);
        }

        $entity->setTranslations('name', [
            'en' => $data['name_en'],
            'fr' => $data['name_fr']
        ]);
        $entity->setTranslations('description', [
            'en' => $data['description_en'],
            'fr' => $data['description_fr']
        ]);
        $entity->price = $data['price'];
        $entity->save();

        // Example of using the image service
        $this->imageService->resizeImage('path/to/image.jpg', 300, 200, 'path/to/resized_image.jpg');
        $this->imageService->applyEffects('path/to/image.jpg', 'path/to/edited_image.jpg');

        return $entity->load('attributes');
    }
}
