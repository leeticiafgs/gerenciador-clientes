function mascaraTelefone(input) {
    let valor = input.value.replace(/\D/g, '');
    let padrao = /^(\d{2})(\d{4,5})(\d{4})$/;

    if (padrao.test(valor)) {
        input.value = '(' + RegExp.$1 + ') ' + RegExp.$2 + '-' + RegExp.$3;
    } else {
        input.value = valor;
    }
}