@extends('layout.app')

@section('title', 'Edição de Fornecedor')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('supplier_update', ['id' => $supplier->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="supplier-name" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="supplier-name" name="name" required
                value="{{ $supplier->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="supplier-phone" name="phone" required
                value="{{ $supplier->phone }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="supplier-email" name="email" required
                value="{{ $supplier->email }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-zipcode" class="form-label">CEP</label>
            <input type="text" class="form-control cep-mask" id="supplier-zipcode" name="zipcode" required
                value="{{ $supplier->zipcode }}">
            @error('zipcode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="supplier-street" name="street" required
                value="{{ $supplier->street }}">
            @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-address-number" class="form-label">Número</label>
            <input type="text" class="form-control" id="supplier-address-number" name="address_number" required
                value="{{ $supplier->address_number }}">
            @error('address_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-address-comp" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="supplier-address-comp" name="address_comp"
                value="{{ $supplier->address_comp }}">
            @error('address_comp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-district" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="supplier-district" name="district" required
                value="{{ $supplier->district }}">
            @error('district')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="supplier-city" name="city" required
                value="{{ $supplier->city }}">
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-state" class="form-label">Estado</label>
            <input type="text" class="form-control" id="supplier-state" name="state" required
                value="{{ $supplier->state }}">
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/getAddress.js') }}"></script>
@endsection
