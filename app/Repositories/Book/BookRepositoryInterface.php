<?php
namespace App\Repositories\Book;

use Illuminate\Support\Facades\Request;

interface BookRepositoryInterface
{
    /**
     * Get 5 books hot in a month the last
     * @return mixed
     */
    public function getHotBook();

    /**
     * Eager loading book with author
     * @return mixed
     */
    public function getBookWithAuthor();

    /**
     * Jquery Autocomplete
     * @return mixed
     */
    public function searchBooks($keyword);

}
