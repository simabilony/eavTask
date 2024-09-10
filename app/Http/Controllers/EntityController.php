<?php
namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\Attribute;
use App\Services\ImageService;
use Illuminate\Http\Request;
class EntityController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
public function store(Request $request)
{
        // إنشاء كيان جديد
        $entity = Entity::create(['name' => $request->name]);
        // إضافة السمات والقيم
        foreach ($request->attributes as $attributeData) {
        $attribute = Attribute::firstOrCreate([
            'name' => $attributeData['name'],
            'type' => $attributeData['type']]);
        $entity->attributes()->attach($attribute->id, ['value' => $attributeData['value']]);
}
    $entity = new Entity();
    $entity->setTranslations('name', [
        'en' => $request->input('name_en'),
        'fr' => $request->input('name_fr')
    ]);
    $entity->setTranslations('description', [
        'en' => $request->input('description_en'),
        'fr' => $request->input('description_fr')
    ]);
    $entity->price = $request->input('price');
    $entity->save();
        return response()->json($entity->load('attributes'), 201);
    // مثال على استخدام خدمة الصور
    $this->imageService->resizeImage('path/to/image.jpg', 300, 200, 'path/to/resized_image.jpg');
    $this->imageService->applyEffects('path/to/image.jpg', 'path/to/edited_image.jpg');

    return response()->json(['message' => 'Product created and image processed successfully.']);
}
    public function show($id)
    {
        // استرجاع الكيان مع السمات
        $entity = Entity::with('attributes')->findOrFail($id);
        $nameInEnglish = $entity->getTranslation('name', 'en');
        $nameInFrench = $entity->getTranslation('name', 'fr');
        return response()->json([
            'entity' => $entity,
            'name_in_english' => $nameInEnglish,
            'name_in_french' => $nameInFrench
        ]);
    }
    public function index()
    {
        // استرجاع الكيان مع السمات
        $entity = Entity::with('attributes')->get();
        return response()->json($entity);
    }
}
