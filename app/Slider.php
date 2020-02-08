<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['slider_heading','slider_paragraph','publication_status','slider_image'];

    protected static function imageUpload($request){
        $sliderImage        = $request->file('slider_image');
        $sliderImageName    = $sliderImage->getClientOriginalName();
        $derectory          ='slider-image/';
        $imagePath          =$derectory.$sliderImageName;
        $sliderImage->move($derectory,$imagePath);
        return $imagePath;

    }
    public static function saveSliderInfo($request)
    {
        $imagePath = Slider::imageUpload($request);
        $slider = new Slider();
        $slider->slider_heading = $request->slider_heading;
        $slider->slider_paragraph = $request->slider_paragraph;
        $slider->publication_status = $request->publication_status;
        $slider->slider_image = $imagePath;
        $slider->save();
    }
    public static function updatedSliderInfo($request)
    {
        $slider = Slider::find($request->id);
        $sliderImage = $request->file('slider_image');
        if ($sliderImage){
            unlink($slider->slider_image);
            $imagePath  = Slider::imageUpload($request);
        }
        $slider->slider_heading = $request->slider_heading;
        $slider->slider_paragraph = $request->slider_paragraph;
        $slider->publication_status = $request->publication_status;
        if (isset($imagePath)){
            $slider->slider_image = $imagePath;
        }
        $slider->save();
    }
    public static function deleteSliderInfo($request)
    {
        $slider = Slider::find($request->id);
        if (file_exists($slider->slider_image)){
            unlink($slider->slider_image);
        }
        $slider->delete();
    }
}
