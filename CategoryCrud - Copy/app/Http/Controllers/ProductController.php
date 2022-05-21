<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $product = Product::all();
            return Datatables::of($product)
                ->setRowClass('{{ $id %2==0 ? "alert-success" : "alert-warning"}}')
                ->setRowId(function ($product) {
                    return $product->id;
                })
                ->addColumn('category', function ($product) {
                    return $product->category->category_name;
                })
                ->editColumn('created_at', function ($product) {
                    return $product->created_at->diffForHumans();
                })
                ->editColumn('updated_at', function ($product) {
                    return $product->updated_at->diffForHumans();
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" >Edit</a>';
                    $btn = $btn .  '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm "onClick="confirmDelete()" >Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $categories = Category::all();
        return view('product.index', compact('categories'));
    }


    public function getProducts(Request $request , Product $product){

        
    }


    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|min:2',
            'category_id' => 'required',
            // 'is_active' => 'required',
        ]);

        $attributes['category_id'] = $request->category_id;
        $request->merge(['is_active' => $request->is_active ?? '0']);
        $attributes = $request->all();
        if ($request->hasFile('image')) {
            upload($request->file('image'), 'products');
        }
        // return $attributes;
        //  return $request->subcategory;

        $product = Product::Create($attributes);

        $product->subcategories()->sync($request->subcategory);
        // return $product;
        //   return redirect('/products');
        return response()->json([
            'status'=>200,
            'message'=>'Product Added Successfully',
        ]);
    }


    public function subCat(Request $request)
    {


        $category_id = $request->cat_id;

        $subcategories = Category::where('id', $category_id)
            ->with('subcategories')
            ->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function edit($id)
    {

        $product = Product::with('subcategories')->findOrFail($id);
        $productSubcategories =  $product->subcategories->pluck('id');
        $categories = Category::all();
        $subs = Subcategory::where('category_id', $product->category_id)->get();
        return view('product.update', compact('product', 'categories', 'subs', 'productSubcategories'));
    }


    public function update(Request $request)
    {

        $id = $request->id;
        $product = Product::findOrFail($id);
        $attributes = request()->validate([
            'name' => 'required|min:2',
            'category_id' => 'required',
            'subcategory' => 'required'
        ]);
        $request->merge(['is_active' => $request->is_active ?? '0']);
        $attributes = $request->all();
        $subcats = $request->subcategory;
        // return $attributes;
        $product->update($attributes);
        $product->subcategories()->sync($subcats);

        $attributes = $request->all();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('product')->with('message', 'Category deleted Successfully');
    }
}
