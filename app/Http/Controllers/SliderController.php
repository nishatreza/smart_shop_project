<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;

class SliderController extends Controller {

    public function addSlider() {


        return view('admin.slider.addSlider');
    }

    public function storeSlider(Request $req) {

        $req->validate([
            'productImage' => 'required',
            'productImage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publicationStatus' => 'required',
        ]);


        if ($req->hasfile('productImage')) {

            foreach ($req->file('productImage') as $image) {
                $slider = new slider;
                $name = $image->getClientOriginalName();
                $slider->productImage=$name;
                $slider->publicationStatus = 1;
                $image->move(public_path() . '/slider/', $name);
                $slider->save();
//                        echo '<pre>';
//        print_r($slider);
//        exit();
                // $data[] = $name = public_path() . '/images/silder/' . $name;
            
//                $name = $image->getClientOriginalName();
//                $image->move(public_path() . '/images/silder/', $name);
//                $data[] = $name;
            }
        }
//        $slider = new slider();
//        $slider->productImage = json_encode($data);
//        $slider->productImage = implode("|",$data);
        
//        $slider->publicationStatus = $req->publicationStatus;
//
//        $slider->save();
        
//        echo '<pre>';
//        print_r($slider);
//        exit()

        return redirect('/add-slider')->with('success', 'Your images has been added successfully');
    }

}
