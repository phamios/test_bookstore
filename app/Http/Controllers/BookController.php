<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Book\BookRepository;

class BookController extends Controller
{
    /**
     * @var BookRepositoryInterface|\App\Repositories\Repository
     */
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    /**
     * Show all book
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $start = microtime(true);
        // $books = $this->bookRepository->getAll();
        // $books = $this->bookRepository->getHotBook();
        $books = $this->bookRepository->getBookWithAuthor();

        // $time_elapsed_secs = microtime(true) - $start;
        // dd($time_elapsed_secs);

        // return response()->json($books);

        return view('index', [
            'books' => $books,
        ]);
    }

    /**
     * Show single book
     *
     * @param $id int book ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookRepository->find($id);

        return view('home.book', compact('book'));
    }

    /**
     * Create single book
     *
     * @param $request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $book = $this->bookRepository->create($data);

        return view('home.book', compact('book'));
    }

    /**
     * Update single book
     *
     * @param $request \Illuminate\Http\Request
     * @param $id int book ID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $book = $this->bookRepository->update($id, $data);

        return view('home.book', compact('book'));
    }

    /**
     * Delete single book
     *
     * @param $id int book ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return view('home.book');
    }

    /**
     * Search books
     *
     * @param $id int book ID
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $start = microtime(true);

        if($request->input('q')){
            $books = $this->bookRepository->searchBooks($request->input('q'));
            // $time_elapsed_secs = microtime(true) - $start;
            // dd($time_elapsed_secs);
        }

        if($request->input('f')){
            $books = $this->bookRepository->searchFaster($request->input('f'));
            // $time_elapsed_secs = microtime(true) - $start;
            // dd($time_elapsed_secs);
        }

        return response()->json($books);
    }
}
