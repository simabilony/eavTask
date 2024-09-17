<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreEntityRequest;
use App\Models\Entity;
use App\Services\EntityService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class EntityController extends Controller
{
    protected EntityService $entityService;
    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }
/**
* @OA\PathItem(path="/api")
* @OA\Get(
*     path="/api/products/{slug}",
*     tags = {"Products"},
*     summary="Get one product",
   *     @OA\Parameter(
   *      name="Accept-Language",
   *      in="header",
   *     required=true, schema={"type": "string", "enum": {"en", "ar" , "es" , "fr", "fa" , "zh" , "ru"}, "default": "en"}
   *     ),
   *     @OA\Parameter(
   *         in="path",
   *         name="slug",
   *         required=true,
   *         @OA\Schema(type="string"),
   *     ),
     *     @OA\Parameter(
     *          name="convertCurrency",
     *          in="query",
     *          required=false,
     *          description="Currency to convert product price",
     *          schema={"type": "string", "enum": {"KWD", "SYP", "USD", "SAR", "EUR"}, "default": "KWD"}
     *     ),
   *     @OA\Response(
   *         response=200,
   *         description="OK"
    *     )
   * )
   * /
   **/
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
