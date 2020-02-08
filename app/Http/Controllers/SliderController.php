<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class SliderController extends Controller
{
    public function addSlider(){
        return view('admin.slider.add-slider');
    }
    protected function sliderValidateData($request){
        $this->validate($request, [
            'slider_heading'    =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:5|Max:40',
            'slider_paragraph'  =>'required|regex:/(^([a-zA-z _]+)(\d+)?$)/u|Min:20|Max:500',
            'publication_status'=>'required',
            'slider_image'      =>'required',
        ]);
    }
    public function newSlider(Request $request){
        $this->sliderValidateData($request);
        Slider::saveSliderInfo($request);
        return redirect()->back()->with('message','Slider info save successfully');
    }
    public function manageSlider(){
        $sliders = Slider::all();
        return view('admin.slider.manage-slider',['sliders'=>$sliders]);
    }
    public function editSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit-slider',['slider'=>$slider]);
    }
    public function updateSlider(Request $request){
        Slider::updatedSliderInfo($request);
        return redirect()->back()->with('message','Slider info Updated successfully');
    }
    public function deleteSlider(Request $request){
       Slider::deleteSliderInfo($request);
        return redirect()->back()->with('message','Slider info Deleted Successfully');
    }
}
