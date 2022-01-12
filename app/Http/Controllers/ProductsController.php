<?php

namespace App\Http\Controllers;

use DataTable;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = Product::all();
        $query = Product::join('categories', 'categories.id', '=', 'products.category_id')
                            ->get(['products.*', 'categories.name as NamaKategori']);     
        // dd($query);
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary btn-block" href="' . route('products.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger btn-block delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                    ';
                })
                ->editColumn('desc', function($item) {
                    return '
                        <p class="line-camp">' . $item->desc . '</p>
                    ';
                })
                ->editColumn('image', function($item) {
                    // $image = Storage::exists('public/' . $item->image) && $item->image ? Storage::url($item->image) : asset('storage/imagePlaceholder.png');
                    // return '
                    //     <div class="image-wrapper">
                    //         <div class="image" style="background-image: url('. $image .')"></div>
                    //     </div>
                    // ';
                    return '
                        <img src="' . asset('storage/' . $item->image) . '" alt="' . $item->name . '" class="img-thumbnail">
                    ';
                })
                ->rawColumns(['action', 'desc', 'image'])
                ->addIndexColumn()
                ->make();

        }
        

        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
        ];
        $this->validate($request, $rule);
        $data = $request->all();
        $data['image'] = $request->file('image')->store('products', 'public');

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Products Berhasil Ditambahkan');
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
        $data = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('data', 'categories'));
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
        $rule = [
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $item = Product::findOrFail($id);
        
        if($request->hasFile('image')) {
            Storage::delete('public/' . $item->image);
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $item->update($data);

        return redirect()->route('products.index')->with('success', 'Data Produk Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        Storage::delete('public/' . $data->image);
        $result = $data->delete();

        return response()->json($result);
    }
}
