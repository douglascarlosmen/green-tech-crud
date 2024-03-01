@extends('layout.app')

@section('title', 'Cadastro de Fornecedor')

@section('content')
    @include('includes.errors')
    <form action="{{ route('supplier_store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="supplier-name" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="supplier-name" name="name" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="supplier-phone" name="phone" required value="{{ old('phone') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="supplier-email" name="email" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-zipcode" class="form-label">CEP</label>
            <input type="text" class="form-control cep-mask" id="supplier-zipcode" name="zipcode" required value="{{ old('zipcode') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="supplier-street" name="street" required value="{{ old('street') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-address-number" class="form-label">Número</label>
            <input type="text" class="form-control" id="supplier-address-number" name="address_number" required value="{{ old('address_number') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-address-comp" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="supplier-address-comp" name="address_comp" value="{{ old('address_comp') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-district" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="supplier-district" name="district" required value="{{ old('district') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="supplier-city" name="city" required value="{{ old('city') }}">
        </div>
        <div class="mb-3">
            <label for="supplier-state" class="form-label">Estado</label>
            <input type="text" class="form-control" id="supplier-state" name="state" required value="{{ old('state') }}">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/getAddress.js') }}"></script>
@endsection
