<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $perpage = $request->query('perpage', 2);
        $page = $request->query('page', 1);
        $nom = $request->query('nom');

        $query = Product::query();

        if ($nom) {
            $query->where('nom', 'like', "%{$nom}%");
        }
        $productes = $query->paginate($perpage, ['*'], 'page', $page);

        return response()->json($productes);
    }

    public function store(ProductRequest $request){
        Product::create($request->only([
            'nom',
            'description',
            'prix',
            'estDisponible',
            'quantiteStock',
            'imageUrl',
            'categorieId'
        ]));
        return response()->json(['success' => true, 'message' => 'Product added successfully.']);

    }
    public function Product($id){
        $product=Product::findOrFail($id);
        return response()->json($product);
    }
    public function PutProduct(ProductRequest $request, $id)
    {

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
        }
        $product->update($request->only([
            'nom',
            'description',
            'prix',
            'estDisponible',
            'quantiteStock',
            'imageUrl',
            'categorieId'
        ]));


        return response()->json(['success' => true, 'message' => 'Product updated successfully.']);
    }
}

