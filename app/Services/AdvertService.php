<?php

namespace App\Services;

use App\Models\Advert;
use App\Models\Banner;
use http\Env\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class AdvertService
{

    /**
     * @param $request
     * @return mixed
     */
    public function saveAdvert($data) : mixed
    {
        $advertData = arr::only($data, [
            'advert_name',
            'date_from',
            'date_to',
            'total_budget',
            'daily_budget'
        ]);

        $advert = Advert::create($advertData);

        //return new object with id
        return $advert->fresh();
    }

    /**
     * @return mixed
     */
    public function getAdverts() : mixed
    {
        return Advert::orderByDesc('id')->with(['banner'])->get();
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function saveBanner($request, $id) : bool
    {
        if($request->hasfile('files')) {
            $files = $request->file('files');
            $banner = [];
            foreach ($files as $key => $file){
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $file_path = '/storage/' . $filePath;
                $banner[] = [
                    'advert_id' => $id,
                    'image' => $file_path
                ];
            }

            return Banner::insert($banner);
        }
        return false;
    }
}
