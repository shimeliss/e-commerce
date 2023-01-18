<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorry;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index(){
        $category = Categorry::all();
        return view('admin.category.index',compact('category')) ; 
    }
    public function add(){
        return view('admin.category.add') ; 
    }

    public function insert(Request $request){
        $categories = new Categorry();
    if($request->hasfile('image')){
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'. $ext;
        $file->move('assets/uploads/category',$filename);
        $categories->image = $filename;

    }
    $categories->name = $request->input('name');
    $categories->slug = $request->input('slug');
    $categories->description = $request->input('description'); 
    $categories->status = $request->input('status') == TRUE ? '1':'0';
    $categories->popular = $request->input('popular') == TRUE ? '1':'0';
    $categories->meta_title = $request->input('meta_title');
    $categories->meta_descrip = $request->input('meta_descrip');
    $categories->meta_keywords = $request->input('meta_keywords');
    $categories->save();
    return redirect('/dashboard')->with('status',"category added successfully");
    }
    public function edit( $id)
    {
        $category = Categorry::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Categorry::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'. $category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'. $ext;
        $file->move('assets/uploads/category',$filename);
        $category->image = $filename;
        }
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->description = $request->input('description'); 
    $category->status = $request->input('status') == TRUE ? '1':'0';
    $category->popular = $request->input('popular') == TRUE ? '1':'0';
    $category->meta_title = $request->input('meta_title');
    $category->meta_descrip = $request->input('meta_descrip');
    $category->meta_keywords = $request->input('meta_keywords');
    $category->update();
    return redirect('/dashboard')->with('status',"category updated successfully");
    }
    public function destory($id)
    {
        $category = Categorry::find($id); 
        if($category->image){
            $path = 'assets/uploads/category/'. $category->image; 
            if(File::exists($path)){
                File::delete($path);
            } 
        }
        $category->delete();
        return redirect('category')->with('status',"category deleted successfully");
    
    }
}
