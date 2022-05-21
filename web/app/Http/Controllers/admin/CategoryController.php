<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('category')->get();;
        return view('backend.category.index',['category' => $category]);
    }

    public function hadnelAdd(Request $request)
    {
        $name = $request->name;
        $parent = $request->parent;
        $insert = DB::table('category')->insert([
            'namecate' => $name,
            'parent_id' =>$parent
        ]);
        if($insert){
            return redirect()->route('admin.category');
        }else{
            return redirect()->back()->with('fail','Thêm không thành công');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $category = DB::table('category')->where('id',$id)->first();
        return view('backend.category.update',['category'=>$category]);
    }

    public function hadnelUpdate(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $parent_id = $request->parent;
        DB::table('category')->where('id',$id)->update([
            'namecate'=>$name,
            'parent_id'=>$parent_id
        ]);
        return redirect()->route('admin.category');
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->id;
        $del = DB::table('category')->where('id',$id)->delete();
        if($del){
            return response()->json([
                'cod' => 200,
                'mess'=> 'delete succes'
            ]);
        }else{
            return response()->json([
                'cod' =>300,
                'mess'=> 'delete succes'
            ]);
        }
    }
    //
}
