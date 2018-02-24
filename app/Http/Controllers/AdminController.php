<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getDashboard(){
        return view('admin.dashboard');
    }
    public  function getNewCat(){
        return view('cat.new_cat');
    }
    public function postCategory(Request $request){
        $this->validate($request,[
            'new_cat'=>'required',
        ]);
        $cat=new Cat();
        $cat->category=$request['new_cat'];
        $cat->save();
        return redirect()->back()->with('info','Insert Category Successfully');

    }
    public function showCat(){
        $cat=Cat::all();
        return view('cat.show_cat')->with(['cat'=>$cat]);
    }
    public function getNewBook(){
        $cat=Cat::all();
        return view('Book.new_book')->with(['cat'=>$cat]);
    }
    public function postNewBook(Request $request){
        $this->validate($request,[
            'bookName'=>'required',
            'authorName'=>'required',
            'category'=>'required',
            'book_cover'=>'required|mimes:jpg,png,gif,jpeg',
            'book_file'=>'required',
        ]);
        $book_cover=$request->file('book_cover');
        $cover_exe=$request->file('book_cover')->getClientOriginalExtension();
        $cover_name=$request['bookName'].'.'.$cover_exe;

        $book_file=$request->file('book_file');
        $file_exe=$request->file('book_file')->getClientOriginalExtension();
        $file_name=$request['bookName'].'.'.$file_exe;

        $book=new Book();
        $book->bookName=$request['bookName'];
        $book->authorName=$request['authorName'];
        $book->cat_id=$request['category'];
        $book->book_cover=$cover_name;
        $book->book_file=$file_name;
        $book->save();
        Storage::disk('cover')->put($cover_name,file($book_cover));
        Storage::disk('book')->put($file_name,file($book_file));
        return redirect()->back()->with('book','Insert Book Successfully');
    }
    public  function showBook(){
        $book=Book::all();
        return view('Book.show_book')->with(['book'=>$book]);
    }
    public function getImage($file_name){
        $file=Storage::disk('cover')->get($file_name);
        return response($file,200)->header('Content_Type','*/*');
    }

    public function getDelete(){
        $cat=Cat::all();
        return view('cat.delete')->with(['cat'=>$cat]);
    }
    public function getDeleteCat($deleteCat){
        $cat=Cat::where('id',$deleteCat)->first();
        $cat->delete();
        return redirect()->back();
    }
    public function getDeleteBook(){
        $book=Book::all();
        return view('Book.delete')->with(['book'=>$book]);
    }
    public function DeleteBook($del){
        $book=Book::where('id',$del)->first();
        $book->delete();
        return redirect()->back();
    }
    public function getUpdateBook(){
        $book=Book::all();
        return view('Book.update')->with(['book'=>$book]);
    }
    public function BookUpdate($updateBook){
        $book=Book::find($updateBook);

        return view('Book.updateBook')->with(['book'=>$book]);
    }
    public function postUpdate(Request $req){
        $book=new Book();
      $book=Book::find($req->input('user_id'));
    $book->bookName=$_REQUEST['bookName'];
    $book->authorName=$_REQUEST['authorName'];
      $book->save();
      return redirect()->route('show_book');


    }
}
