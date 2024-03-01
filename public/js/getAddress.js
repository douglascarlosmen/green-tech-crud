$(document).ready(function () {
    $('.cep-mask').mask('00000-000');

    $('#supplier-zipcode').on('blur', function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
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
