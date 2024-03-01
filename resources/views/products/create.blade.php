@extends('layout.app')

@section('title', 'Cadastro de Fornecedor')

@section('content')
    @include('includes.errors')
    <form action="{{ route('products_store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product-code" class="form-label">Código</label>
            <input type="text" class="form-control" id="product-code" name="code" value="{{ old('code') }}">
        </div>
        <div class="mb-3">
            <label for="product-name" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="product-name" name="name" required
                value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="product-description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="product-description" name="description" required
                value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="product-price" class="form-label">Preço unitário</label>
            <input type="text" class="form-control" id="product-price" name="price" required
                value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="product-category" class="form-label">Categoria</label>
            <input type="text" class="form-control cep-mask" id="product-category" name="category" required
                value="{{ old('category') }}">
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Fornecedor</label>
            <select class="form-select" id="supplier" name="supplier_id" required>
                <option selected>Escolha um Fornecedor...</option>
                @foreach ($suppliers as $supplier)
                    <option @if (old('supplier_id') == $supplier->id) selected @endif value="{{ $supplier->id }}">
                        {{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product-amount" class="form-label">Qntd. Estoque</label>
            <input type="number" class="form-control" id="product-amount" name="amount" required
                value="{{ old('amount') }}">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/productMasks.js') }}"></script>
@endsection
