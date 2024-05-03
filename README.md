
- run serve using XAMPP or Docker ( Docker-compose include )
- connect to db bookreader
- import database inside folder DB store/bookreader.sql

Relevant Tutorials:
- Run First : 
- [ docker-compose build app ]

# Run App with Docker : 
- Step0: Start your docker app ( windows / macOS )
- Step1: docker-compose up -d 
- Step2: import database inside folder DB store/bookreader_db.sql.zip

- Step 3: Run system : http://localhost:8000/search/book?f={keyword}

- Step 4: Default list all Ebook infor: http://localhost:8000 

# Explain App

In this system we have 2 options for searching 
- Normal Search
- Faster Search 

```
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
```

- Default we using book?q=xxxx to search normal: it take 10s with 1m rows 
- If faster we can use book?f=xxx to faster search. ( http://localhost:8000/search/book?f={keyword} )

