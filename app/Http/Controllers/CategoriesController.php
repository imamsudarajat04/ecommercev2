<?php

namespace App\Http\Controllers;
use DataTables;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $query = Category::all();
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary btn-block" href="' . route('categories.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger btn-block delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }

        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Categories Berhasil Ditambahkan');
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
        $data = Category::findOrFail($id);
        return view('admin.categories.edit', compact('data'));
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
        $data = $request->all();
        $item = Category::findOrFail($id);
        $item->update($data);
        return redirect()->route('categories.index')->with('success', 'Categories Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return response()->json($data);
    }
}
