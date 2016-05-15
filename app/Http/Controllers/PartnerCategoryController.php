<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PartnerCategory;
use App\Http\Requests;
use Validator;

class PartnerCategoryController extends Controller
{
    public function index(){
        return view('admin.partnercategory.index', ['partner_categories' => PartnerCategory::all()]);
    }

     public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'partnercategoryname' => 'required|unique:partner_categories,name',
        ]);
        if ($validator->fails()) {
           return  redirect()->route('partnercategory.index')->withErrors($validator);
        } else {
            $partnercategory = new PartnerCategory();
            $partnercategory->name   = $request['partnercategoryname'];
            $partnercategory->save();
            return redirect()->route('partnercategory.index');
        }
    }

     public function edit($id){
        return view('admin.partnercategory.edit',['partnercategory' => PartnerCategory::where('id', $id)->first()]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'partnercategoryname' => 'required|unique:partner_categories,name',
        ]);
        if ($validator->fails()) {
           return  back()->withErrors($validator);
        } else {
            $partnercategory = PartnerCategory::where('id', $id)->first();
            $partnercategory->name   = $request['partnercategoryname'];
            $partnercategory->save();
            return redirect()->route('partnercategory.index');
        }
    }

     public function destroy($id){
        PartnerCategory::where('id', $id)->delete();
        return redirect()->route('partnercategory.index');
    }
}