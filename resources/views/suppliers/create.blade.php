@extends('layout.app')

@section('title', 'Cadastro de Fornecedor')

@section('content')
    <form action="{{ route('supplier_store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="supplier-name" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="supplier-name" name="name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="supplier-phone" name="phone" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="supplier-email" name="email" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-zipcode" class="form-label">CEP</label>
            <input type="text" class="form-control cep-mask" id="supplier-zipcode" name="zipcode" required>
            @error('zipcode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-street" class="form-label">Rua</label>
            <input type="text" class="form-control" id="supplier-street" name="street" required>
            @error('street')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-address-number" class="form-label">Número</label>
            <input type="text" class="form-control" id="supplier-address-number" name="address_number" required>
            @error('address_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-address-comp" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="supplier-address-comp" name="address_comp">
            @error('address_comp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-district" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="supplier-district" name="district" required>
            @error('district')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="supplier-city" name="city" required>
            @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier-state" class="form-label">Estado</label>
            <input type="text" class="form-control" id="supplier-state" name="state" required>
            @error('state')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.cep-mask').mask('00000-000');

            $('#supplier-zipcode').on('blur', function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep != "") {
                    var validacep = /^[0-9]{8}$/;
                    if (validacep.test(cep)) {
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                $('#supplier-street').val(dados.logradouro);
                                $('#supplier-district').val(dados.bairro);
                                $('#supplier-city').val(dados.localidade);
                                $('#supplier-state').val(dados.uf);
                                $('#supplier-address-number')
                                    .focus(); // Move o foco para o campo número
                            } else {
                                alert("CEP não encontrado.");
                            }
                        });
                    } else {
                        alert("Formato de CEP inválido.");
                    }
                }
            });
        });
    </script>
@endsection
