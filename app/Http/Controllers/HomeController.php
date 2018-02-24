<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public  function getIndex(){
        $books=Book::OrderBy('id','desc')->paginate('6');
        $cat=Cat::all();
        return view('index')->with(['cat'=>$cat])->with(['books'=>$books]);
    }
    public function getImage($file_name){
        $file=Storage::disk('cover')->get($file_name);
        return response($file,200)->header('Content-Type','*/*');
    }
    public function getFile($image_file){
        $file=Storage::disk('book')->get($image_file);
        return response($file,200)->header('Content-Type','*/*');
    }
    public function getCategory($cat_id){
        $cat=Cat::all();
        $books=Book::where('cat_id',$cat_id)->paginate('6');
        return view('index')->with(['cat'=>$cat])->with(['books'=>$books]);

    }
    public function getSearch(Request $request){
        $q=$request['q'];

        $cat=Cat::all();
        $books=Book::where('bookName','like','%'.$q.'%')->orWhere('authorName', 'like','%'.$q.'%')->paginate('2');
        return view('index')->with(['cat'=>$cat])->with(['books'=>$books]);

    }
}
