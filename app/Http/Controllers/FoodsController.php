<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Foods;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\Redis;

class FoodsController extends Controller
{
    //
    public function index()
    {
        $foods = Foods::all();//Select * from foods;
        // dd($foods);
        //filter
        // $foods = Foods::where('name','=','sushi')
                        // ->firstOrFail();//trả về 1 đối tượng thôi;
                        // ->get();
        
        //truyền đối tượng $foods vào trong view
        return view('foods.index',
        [
            'foods'=>$foods,

        ]);
    }

    public function create()
    {
        //insert new food
        $categories = Category::all();
        return view('foods.create')->with('categories',$categories);
    }

    //sau khi nhấn submit ở giao diện create phía trên thì vào store
    public function store(Request $request)
    {
        // $request->file('image')->guessExtension();//trả về đuôi file
        // $request->file('image')->getMimeType();//kiểm file ảnh đúng chưa?
        // $request->file('image')->getClientOriginalName();//trả về tên đầy đủ của file ảnh
        // dd($request->file('image')->getSize());//trả về dung lượng kilobyte
        // $request->file('image')->getError();//trả về lỗi khi load ảnh lên
        // dd($request->file('image')->isValid());//trả về true nếu load ok
        // if ($request->hasFile('image') ) {
        //     dd('File is valid and was uploaded successfully.');
        // } else {
        //     dd('No valid file was uploaded.');
        // }
        
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'count'=>'required|integer|min:0|max:200',
            'descriptions'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        //đổi tên file ảnh
        $generatedImageName = 'image'.time().'-'
        .$request->name.'.'
        .$request->image->extension();

        // dd($generatedImageName);


        //chuyển hình ảnh tới thư mục lưu trữ(đối tượng đang nằm trong bộ nhớ tạm)
        $request->image->move(public_path('images'),$generatedImageName);


        // dd('This is store function');
        //insert dữ liệu mới
        //C1
        // $food = new Foods();
        // $food->name = $request->input('name');
        // $food->count = $request->input('count');
        // $food -> descriptions = $request -> input('descriptions');


        // dd($request);

        //validate c1
        
        // $request->validate([
        //     'name'=>'required|unique:foods',
        //     'count'=>'required|integer|min:0|max:100',
        //     'category_id'=>'required',
        // ]);

        //validate c2
        // $request->validated();
        //if the validation is pass, it will come here
        //C2
        $food = Foods::create([
            'name'=>$request->input('name'),
            'count'=>$request->input('count'),
            'descriptions' =>$request->input('descriptions'),
            'category_id' =>$request->input('category_id'),
            'image_path'=>$generatedImageName
        ]);

        //save to DB
        $food -> save();
        return redirect('/foods');
    }

    public function show($id)
    {
        // dd('this show function'.$id);
        $food = Foods::find($id);
        $category = Category::find($food->category_id);
        // dd($category);

        $food->category = $category;
        // dd($food);
        return view('foods.show')->with('food', $food);
    }

    public function edit($id)
    {
        //mới chỉ nhảy sang trang edit.blade.php
        // dd($id);
        $food = Foods::find($id);
        // dd($food);
        return view('foods.edit')->with('food',$food);
    
    }

    //sau khi vao edit.blade.php thi xuong ham update
    //thực thi việc update trên DB
    public function update(CreateValidationRequest $request,$id)
    {
        $request->validated();
        $food = Foods::where('id',$id)
                        ->update([
                            'name'=>$request->input('name'),
                            'count'=>$request->input('count'),
                            'descriptions'=>$request->input('descriptions')
                        ]);

        return redirect('/foods');//điều hướng sang trang /foods             
    }

    public function destroy($id)
    {
        // dd($id);
        $food = Foods::find($id);
        $food->delete();
        return redirect('/foods');//điều hướng sang trang /foods  
    }
    
}
