<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
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

    public function store(SupplierStoreRequest $request)
    {
        try {
            Supplier::create($request->all());
            return redirect()->route('suppliers_index')->with('success', 'Fornecedor cadastrado com sucesso.');
        } catch (\Exception $e) {
            Log::error("Erro ao salvar um novo fornecedor: " . $e->getMessage());
            abort(500);
        }
    }
}
