/**
 * Framework interno da Aplicação.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 */


/**
 * Alerta Gerais em SweetAlert
 * @param Integer iTipoAlerta
 * @param String sArgumento
 * @return SweetAlert
 */
var alertCampos = function(iTipoAlerta, sArgumento){
    //CONSTANTES
    const TIPO_CAMPO_OBRIGATORIO = 1,
          TIPO_CAMPO_CADASTRO    = 2,
          TIPO_CAMPO_BUSCA       = 3,
          TIPO_LOGIN             = 4;
    ////////////////

    if (iTipoAlerta == TIPO_CAMPO_OBRIGATORIO) {
        swal({
            title: "Campos Obrigatórios",
            text: "Preencha os campos destacado em vermelho!",
            icon: "warning",
            dangerMode: true
        });
    } else if (iTipoAlerta == TIPO_CAMPO_CADASTRO) {
        swal({
            title: "Sucesso!",
            text: 'A ' + sArgumento + ' foi cadastrada com sucesso!',
            icon: "success"
        });
    } else if(iTipoAlerta == TIPO_CAMPO_BUSCA){
        swal({
            title: "Aviso",
            text: "Informe um cliente para realizar a busca!",
            icon: "warning",
            dangerMode: true
        });
    } else if(iTipoAlerta == TIPO_LOGIN){
        swal({
            title: "Login Inválido",
            text: "Usuário ou Senha incorretos!",
            icon: "warning",
            dangerMode: true
        });
    }
};

/**
 * Limpa o campo atual.
 */
var limpa = function(){
    this.setValor('');
};


/**
 * Scripts utilizados nas Marcas dos Veículo 
 */
//$(function (){
//    $('#form').on('submit', function(form){
//        form.preventDefault();
//
//        $.ajax({
//           type: 'POST',
//           url: 'marca/processaDados/inc',
//           data: {
//               //Valores dos campos
//               'valores': [$('[name=nomeMarca]').val(), $('[name=descricao]').val()],
//               //Nomes dos campos no modelo
//               'campos': ['nome', 'descricao']
//           },
//           success: function(bInseriu){
//               if(bInseriu){
//                   $('[name=nomeMarca]').val('');
//                   $('[name=descricao]').val('');
//
//                    alertCampos(2, 'Marca');
//               }
//           }
//        });
//    });
//});