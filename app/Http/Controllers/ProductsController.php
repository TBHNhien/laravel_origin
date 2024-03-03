<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index(){
        // $title = 'my Laravel proj of Thai Bao Hao Nhien';
        // $myname='Nhien';
        //c1 truyền đối tượng
        // return view('products.index',compact('title','myname'));//truyen đa đối tượng

        //c2 truyền đối tượng
        // return view('products.index')->with('myname',$myname);
        
        //send associative array
        $myphone = [
            'name'=>'iphone 11pm',
            'year' => '2020',
            'isFavorited'=>true,
        ];
        // return view('products.index',compact('myphone'));

        //send directly => gửi dữ liệu trực tiếp không dùng compact hay with
        //c3
        // return view('products.index',[
        //     'myphone'=>$myphone
        // ]);

        print_r(route('products'));
        return view('products.index');
    }

    //xem chi tiết sản phẩm
    public function detail($productName,$id){


        return "product's name = ".$productName. " ,product's id = ".$id;
        // $phones = [
        //     'iphone 11'=>'iphone 11',
        //     'samsung'=>'samsung'
        // ];

        //thay id bằng name
        //product sẽ là 1 array
        // return view('products.index',[
        //     'product'=>$phones[$productName] ?? 'unknow product'
        // ]);

    }
}
