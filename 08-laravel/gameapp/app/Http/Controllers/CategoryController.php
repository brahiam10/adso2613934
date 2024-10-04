<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(20);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $photo = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$photo);
        }
        $category = new Category;
        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->description = $request->description;
        $category->image = $photo;

        if ($category ->save()) {
            return redirect('categories')->with('message','the user:'.$category->name.'was successfully added'); 
        }
    }
    


    /**
     * Display the specified resource.
     */
     public function show(Category $category)
     {
         return view('categories.show')
             ->with('category', $category);
     }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
     public function edit(Category $category)
     {
         return view('categories.edit')
             ->with('category', $category);
     }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, Category $category)
    {
        if ($request->hasFile('image')) {
            if($request->hasFile('image')) {
                $photo =time() . '.'.$request->image->extension();
                $request->image->move(public_path('images'), $photo);
            }
        } else {
            $photo = $request->originphoto;
        }

            $category->image = $photo;
            $category->name = $request->name;
            $category->manufacturer = $request->manufacturer;
            $category->releasedate = $request->releasedate;
            $category->description = $request->description;

        if ($category->save()) {
            return redirect('categories')->with('message', 'The category: '. $category->name. 'was successfully updated!');
        }
    }
    // /**
    //  * Remove the specified resource from storage.
    //  */
 public function destroy($id)
    {  
        $category=Category::findOrFail($id);
     $category->delete();
        return redirect()->route('categories.index')->with('message', 'usuario eliminado exitosamente');
        if ($category->delete()) {
         return redirect('categories')
                ->with('message' . 'The user: ' . $category->name . ' was successfully deleted!');
        } 
    }
     
    public function search(Request $request){
        $categories = Category::names($request->q)->paginate(20);
        return view('categories.search')->with('categories', $categories);
    }  
}
