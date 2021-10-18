<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Services\AdvertService;
use App\Services\AdvertRequest;
use http\Env\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    private AdvertService $advertService;

    /**
     * AdvertController constructor.
     * @param AdvertService $advertService
     */
    public function __construct(AdvertService $advertService)
    {
        $this->advertService = $advertService;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json(
            $this->advertService->getAdverts(),
            200
        );
    }

    /**
     * @param AdvertRequest $request
     * @return JsonResponse
     */
    public function store(AdvertRequest $request): JsonResponse
    {
        $data = $request->validated();
        $advert = $this->advertService->saveAdvert($data);
//        dd($request->file('files'));
        $this->advertService->saveBanner($request, $advert->id );

        return response()->json(
            ['message'=> 'New Advert added'],
            201
        );
    }
}
