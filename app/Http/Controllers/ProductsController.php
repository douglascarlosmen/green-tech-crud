<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
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

    public function edit($id)
    {
        return view('products.edit', ['product' => Product::findOrFail($id), 'suppliers' => Supplier::all()]);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return redirect()->route('products_edit', ['id' => $id])->with('success', 'Produto atualizado com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao atualizar o produto de id $id: " . $e->getMessage());
            abort(500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('products_index')->with('success', 'Produto excluído com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o produto de id $id: " . $e->getMessage());
            abort(500);
        }
    }
}
