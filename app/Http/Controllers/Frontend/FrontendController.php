<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorry;

class FrontendController extends Controller
{
    public function index()  
    {
        $feature_product = Product::where('trending','1')->take(15)->get();
        $trending_category = Categorry::where('popular','1')->take(15)->get();
        return view('frontend.index', compact('feature_product', 'trending_category'));
    }
    public function category()
    {
        $categorry = Categorry::where('status','0')->get();
       
        return view('frontend.categorry', compact('categorry'));
    }
    public function viewcategory($slug)
    {
        if(Categorry::where('slug',$slug)->exists())
        {
            $category = Categorry::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
        return view('frontend.products.index', compact('category','products'));
        }
        else{
            return redirect('/'->with('status',"slug doesn't exists"));
        }
    }
        public function productview($cate_slug, $prod_slug)
        {
            if(Categorry::where('slug',$cate_slug)->exists())
            {    
          if(Product::where('slug',$prod_slug)->exists())
          {
           $products = Product::where('slug',$prod_slug)->first();
         return view('frontend.products.view', compact('products'));
            }
          else{
            return redirect('/')->with('status',"there is no such product found");
          }
            }
            else{
                return redirect('/')->with('status',"there is no such category found");
              }
        }
}
