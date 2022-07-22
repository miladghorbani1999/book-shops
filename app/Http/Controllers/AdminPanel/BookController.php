<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\BookRequest;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::latest()->paginate(15);;
        return view('auth.products.books',compact('books'));
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $writers = Writer::all();
        return view('auth.products.edit_book',compact('book','categories','writers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BookRequest $request, $id)
    {
        $data = $request->all();
        $data['publication_year'] = jalali_to_solar($data['publication_year']);
        $book = Book::findOrFail($id)->update($data);

//        var_dump($book);
        if ( ! $book)
        {
            App::abort(500, 'Some Error');
        }
        return redirect('panel/books')->with('success', 'پست باموفقیت ویرایش شد.');
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
