<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('products.create', ['suppliers' => Supplier::all()]);
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            Product::create($request->all());
            return redirect()->route('products_index')->with('success', 'Produto cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao salvar um novo produto: " . $e->getMessage());
            abort(500);
        }
    }
}
