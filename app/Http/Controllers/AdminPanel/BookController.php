<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\panel\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        return view('panel.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('panel.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();
        $data['writer_id'] = Auth::user()->id;
        $data['publication_year'] = jalali_to_solar($data['publication_year']);
        $request = Book::create($data);
        if ( ! $request)
        {
            App::abort(500, 'Some Error');
        }
        return redirect('panel/books')->with('success', 'کتاب باموفقیت اضافه شد.');
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
        return view('panel.books.edit',compact('book','categories','writers'));
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
        $data['writer_id'] = Auth::user()->id;
        $data['publication_year'] = jalali_to_solar($data['publication_year']);
        $book = Book::findOrFail($id)->update($data);

//        var_dump($book);
        if ( ! $book)
        {
            App::abort(500, 'Some Error');
        }
        return redirect('panel/books')->with('success', 'کتاب باموفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
//    dd($id);
        Book::findOrFail($id)->delete();
        return  redirect()->back()->with('success', 'کتاب با موفقیت حذف شد.');
    }
}
