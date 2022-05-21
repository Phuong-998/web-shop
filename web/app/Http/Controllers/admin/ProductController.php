<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->join('category','products.category_id', '=', 'category.id')->get();
        return view('backend.product.index',['product' => $product]);
    }
    
    public function add()
    {
        $category = DB::table('category')->get();
        return view('backend.product.add',['category' => $category]);
    }
    
    public function hadnelAdd(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $qty = $request->qty;
        $price = $request->price;
        $discout = $request->discout;
        $des = $request->des;
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('storage/image/backend',$image);

        DB::table('products')->insert([
            'name'=>$name,
            'category_id'=>$category,
            'price'=>$price,
            'discout'=>$discout,
            'descripton'=>$des,
            'image'=>$image,
            'quanty'=>$qty,
        ]);

        return redirect()->route('admin.products');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $productId = DB::table('products')->where('id',$id)->get();
        dd($productId);
        $categoryId = DB::table('category')->where('id',$productId->category_id)->get()->first();
        
        return view('backend.product.update',['product' => $productId,'category' => $categoryId]);
    }

    public function hadnelUpdate(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $qty = $request->qty;
        $price = $request->price;
        $discout = $request->discout;
        $des = $request->des;

        $image =  $request->img; 
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                
                    $image = $request->file('image')->getClientOriginalName();
                    $request->file('image')->move('storage/image/backend',$image);
                
               
            }
        }

        $update = DB::table('products')->update([
            'name'=>$name,
            'category_id'=>$category,
            'price'=>$price,
            'discout'=>$discout,
            'descripton'=>$des,
            'image'=>$image,
            'quanty'=>$qty
        ]);
        return redirect()->route('admin.products');
    }

    public function deleteProduct(Request $request)
    {
        $id = $request->id;
        $del = DB::table('products')->where('id',$id)->delete();
        if($del){
            return response()->json([
                'cod'=>200,
                'mess'=>'Xóa thành công'
            ]);
        }
    }
    //
}
