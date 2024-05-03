<?php
namespace App\Repositories\Book;

use App\Repositories\EloquentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class BookRepository extends EloquentRepository implements BookRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Books::class;
    }

    /**
     * Get 5 books hot in a month the last
     * @return mixed
     */
    public function getHotBook()
    {
        return $this->_model::latest('id')->take(10)->get();
        // return $this->_model::where('created_at', '>=', Carbon::now()->subMonth())->orderBy('id', 'desc')->take(10)->get();
    }

    /**
     * Eager loading book with author
     * @return mixed
     */
    public function getBookWithAuthor()
    {
        $books = $this->_model::select('id', 'title', 'publisher', 'summary')->paginate(10);
        $books->load('authors');
        return $books;
    }

    /**
     * Jquery Autocomplete
     * @return mixed
     */
    public function searchBooks($keyword)
    {
        return $this->_model::where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%$keyword%")
                  ->orWhere('publisher', 'like', "%$keyword%")
                  ->orWhereHas('authors', function ($query) use ($keyword) {
                      $query->where('name', 'like', "%$keyword%");
                  });
        })
        ->with('authors') // Eager load authors
        ->paginate(10);


    }

    public function searchFaster($keyword){
        $searchResults = $this->_model::search($keyword)->paginate();
        $searchResults->each(function ($book) {
            $book->load('authors');
        });
        return $searchResults;
    }
}
