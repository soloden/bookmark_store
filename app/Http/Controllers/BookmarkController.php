<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Rules\CheckLink;
use App\Services\ScrapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::table('bookmarks')->orderBy('created_at', 'desc')->get();
        return view('bookmark.list', ['data' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => ['required', new CheckLink],
        ]);

        $crawler = new ScrapService($request->get('link'));
        $params = $crawler->scrabb();

        $bookmark = new Bookmark();
        $bookmark->title = $params['title'];
        $bookmark->url = $request->get('link');
        $bookmark->favicon = $params['favicon'];
        $bookmark->keyword = $params['keyword'];
        $bookmark->description = $params['description'];
        $bookmark->password = Hash::make($request->get('password'));
        if ($bookmark->save()) {
            return view('bookmark.element', ['data' => $bookmark])
                ->with('success', 'Закладка добавлена');
        }

        return back()->with('error','Something wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = Bookmark::find($id);
        return view('bookmark.element', ['data' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bookmark::destroy($id);
        return redirect('/')->with('success', 'Закладка удалена');
    }
}
