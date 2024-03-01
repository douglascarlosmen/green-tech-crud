<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Support\Facades\Log;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('suppliers.index', ['suppliers' => Supplier::all()]);
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request)
    {
        try {
            Supplier::create($request->all());
            return redirect()->route('suppliers_index')->with('success', 'Fornecedor cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao salvar um novo fornecedor: " . $e->getMessage());
            abort(500);
        }
    }

    public function edit($id)
    {
        return view('suppliers.edit', ['supplier' => Supplier::findOrFail($id)]);
    }

    public function update(SupplierRequest $request, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->update($request->all());
            return redirect()->route('supplier_edit', ['id' => $id])->with('success', 'Fornecedor atualizado com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao atualizar o fornecedor de id $id: " . $e->getMessage());
            abort(500);
        }
    }

    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            return redirect()->route('suppliers_index')->with('success', 'Fornecedor excluído com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o fornecedor de id $id: " . $e->getMessage());
            abort(500);
        }
    }
}
