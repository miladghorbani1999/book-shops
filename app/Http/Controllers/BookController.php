<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $writers    = Writer::all();
        return view('auth.products.add_book', compact('categories','writers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookRequest $request)
    {
        $request = Book::create([
            'name' => $request->name,
            'price' => $request->price,
            'inventory' => $request->count,
            'category_id' => $request->category,
            'publication_year' => $request->publication_year,
            'description'  => $request->description,
            'writer_id' => $request->writer_id
        ]);
        if ( ! $request)
        {
            App::abort(500, 'Some Error');
        }
        return  redirect()->back()->with('success', 'کتاب با موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
