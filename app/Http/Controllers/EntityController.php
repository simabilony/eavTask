<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityRequest;
use App\Models\Entity;
use App\Services\EntityService;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    protected EntityService $entityService;
    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }
    public function store(StoreEntityRequest $request): \Illuminate\Http\JsonResponse
    {
        $entity = $this->entityService->createEntity($request->validated());
        return response()->json($entity, 201);
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $entity = Entity::with('attributes')->findOrFail($id);
        $nameInEnglish = $entity->getTranslation('name', 'en');
        $nameInFrench = $entity->getTranslation('name', 'fr');
        return response()->json([
            'entity' => $entity,
            'name_in_english' => $nameInEnglish,
            'name_in_french' => $nameInFrench
        ]);
    }
    public function index(): \Illuminate\Http\JsonResponse
    {
        $entities = Entity::with('attributes')->get();
        return response()->json($entities);
    }
}
