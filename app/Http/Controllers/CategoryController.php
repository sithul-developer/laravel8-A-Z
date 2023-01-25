<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->join('users', 'categories.user_id', 'users.id')
            ->select('categories.*', 'name')
            ->orderByDesc('categories.created_at')
            ->paginate(6);
        /*  dd($categories); */

        /*         $categories = Category::where('status', 1)->latest()->get();
        $categories = Category::paginate(3); */
        return view('admin.category.index', compact('categories'));
    }
    public function addCategory(request $request)
    {
        $validated = $request->validate(
            ['category_name' => 'required|unique:categories|max:255|min:4',],

        );
        // To​ insert category
        Category::create([
            'user_id' => Auth::user()->id,
            'category_name' => $request->category_name,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => NULL,
        ]);
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    //To edit Category
    public function editCategory($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    //To Update Category
    public function update(Request $r, $id)
    {
        $update = Category::where('status', '=', 1)->findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'category_name' => $r->category_name,
            'update_at' => Carbon::now(),
            'status' => 1,
        ]);
        return redirect()->route('all.category')->with('success', 'Category is Update successfully!');
    }

    public function softDelete($id)
    {
       $delete_category = Category::findOrFail($id)->delete();

        return redirect()->route('all.category')->with('success', ' Category is Delete  successfully!');
    }
}
