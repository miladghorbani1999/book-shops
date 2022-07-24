<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('panel.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all()->where('parent_id',null);
        return view('panel.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->category_id
        ]);
        return redirect('panel/category')->with('success', 'دسته‌بندی با‌موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $categories = Category::tree()->get();
        $category = $categories->where('id',$id)->first();
        $categories = $categories->toTree();
        return view('panel.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(CategoryRequest $request, $id)
    {
        $is_updatable = Category::findOrFail($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->category_id
        ]);
        if ( ! $is_updatable)
        {
            App::abort(500, 'Some Error');
        }
        return redirect('panel/category')->with('success', 'دسته‌بندی باموفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     * @throws Throwable
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();

        return redirect('panel/category')->with('success', 'دسته‌بندی حذف شد');
    }
}
