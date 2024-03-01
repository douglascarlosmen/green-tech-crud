@extends('layout.app')

@section('title', 'Cadastro de Fornecedor')

@section('content')
    <form action="{{ route('products_store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product-code" class="form-label">Código</label>
            <input type="text" class="form-control" id="product-code" name="code" required>
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-name" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="product-name" name="name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="product-description" name="description" required>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-price" class="form-label">Preço unitário</label>
            <input type="text" class="form-control" id="product-price" name="price" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-category" class="form-label">Categoria</label>
            <input type="text" class="form-control cep-mask" id="product-category" name="category" required>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Fornecedor</label>
            <select class="form-select" id="supplier" name="supplier_id" required>
                <option selected>Escolha um Fornecedor...</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="product-amount" class="form-label">Qntd. Estoque</label>
            <input type="number" class="form-control" id="product-amount" name="amount" required>
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#product-price').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    </script>
@endsection
