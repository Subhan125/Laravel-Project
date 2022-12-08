<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\country;
use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bookes = Book::get(); // get all record without pagination
        $searchTerm = request()->get('s');
        $bookes = Book::latest()->orWhere('title', 'LIKE', "%$searchTerm%")->paginate(15);
        return view('admin/book/index')->with(compact('bookes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/book/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required|not_in:none',
             'author_id' => 'required|not_in:none',
        ]);

       $fileName = null;
        if (request()->hasFile('book_img')) 
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
            $file->move('./uploads', $fileName);
        }
        Book::create([
            'category_id' => request()->get('category_id'),
            'author_id' => request()->get('author_id'),
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'availability' => request()->get('availability'),
            'price' => request()->get('price'),
            'rating' => request()->get('rating'),
            'publisher' => request()->get('publisher'),
            'country_of_publisher' => request()->get('country_of_publisher'),
            'isbn' => request()->get('isbn'),
            'isbn_10' => request()->get('isbn_10'),
            'audience' => request()->get('audience'),
            'format' => request()->get('formet'),
            'language' => request()->get('language'),
            'description' => request()->get('description'),
            'book_upload' => 'No pdf found',
            'book_img' => $fileName,
            'total_pages' => request()->get('total_pages'),
            'downloaded' => request()->get('downloaded'),
            'edition_number' => request()->get('edition_number'),
            'recomended' => request()->get('recomended'),
            'status' => 'DEACTIVE',
        ]);
        return redirect()->to('/admin/book');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $countries = Country::get();
        return view('admin/book/edit')
        ->with(compact('book', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $currentImage = $book->book_img;

        $fileName = null;
        if(Request()->hasFile('book_img'))
        {
           $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }
        $book->update([
            'category_id' => request()->get('category_id'),
            'author_id' => request()->get('author_id'),
            'title' => request()->get('title'),
            'slug' => request()->get('slug'),
            'availability' => request()->get('title'),
            'price' => request()->get('price'),
            'rating' => request()->get('rating'),
            'publisher' => request()->get('publisher'),
            'country_of_publisher' => request()->get('country_of_publisher'),
            'isbn' => request()->get('isbn'),
            'isbn-10' => request()->get('isbn-10'),
            'audience' => request()->get('audience'),
            'format' => request()->get('format'),
            'language' => request()->get('language'),
            'description' => request()->get('description'),
            'book_upload' => 'No pdf found',
            'book_img' => ($fileName) ? $fileName : $currentImage,
            'total_pages' => request()->get('total_pages'),
            'downloaded' => request()->get('downloaded'),
            'edition_number' => request()->get('edition_number'),
            'recomended' => request()->get('recomended'),
            'status' => 'DEACTIVE',
        ]);
       
        if ($fileName)
            File::delete('./uploads/' . $currentImage);
        
        return redirect()->to('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax())
    {
        $book = Book::find($id);
        $currentImage = $book->book_img;
        $book->delete();
        File::delete('./uploads/' . $currentImage);
        return 'true';
    }
    }

    public function status( Request $request, $id)
    {
        sleep(1);
        if ($request->ajax())
    {
        $book = Book::find($id);
        $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $book->update([
            'status' => $newStatus
        ]);
       return $newStatus;
    }
}
public function statusActive(Request $request)
{
    if ($request->ajax())
    {
        foreach ($request->statusAll as $value){
            Book::where('id', $value)->update([ 'status' => 'Active']);
        }
        $record = Book::find($request->statusAll);
        return $record;
    }
    }

    public function statusDeactive(Request $request)
    {
        if($request->ajax())
        {
            foreach ($request->statusAll as $value) {
                Book:: where('id', $value)->update([ 'status' => 'DEACTIVE']);
            }
            $record = Book::find($request->statusAll);
            return $record;
        }
    }
    public function deleteAll(Request $request)
    {
        if ($request->ajax()) 
        {
            foreach ($request->statusAll as $value) {
                Book::where('id', $value)->delete();
            }
            $record = Book::find($request->statusAll);
            return $record;
        }
    }
}
