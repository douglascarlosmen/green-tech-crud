@extends('layout.app')

@section('title', 'Edição de Fornecedor')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('products_update', ['id' => $product->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product-code" class="form-label">Código</label>
            <input type="text" class="form-control" id="product-code" name="code" required value="{{ $product->code }}">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-name" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="product-name" name="name" required
                value="{{ $product->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="product-description" name="description" required
                value="{{ $product->description }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-price" class="form-label">Preço unitário</label>
            <input type="text" class="form-control" id="product-price" name="price" required
                value="{{ $product->price }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-category" class="form-label">Categoria</label>
            <input type="text" class="form-control cep-mask" id="product-category" name="category" required
                value="{{ $product->category }}">
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Fornecedor</label>
            <select class="form-select" id="supplier" name="supplier_id" required>
                <option selected>Escolha um Fornecedor...</option>
                @foreach ($suppliers as $supplier)
                    <option @if ($product->supplier_id == $supplier->id) selected @endif value="{{ $supplier->id }}">
                        {{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-amount" class="form-label">Qntd. Estoque</label>
            <input type="number" class="form-control" id="product-amount" name="amount" required
                value="{{ $product->amount }}">
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/productMasks.js') }}"></script>
@endsection
