function Login(controlador,op)
{
    var txtUsuario = document.getElementById('txtUsuario').value;
    var txtClave = document.getElementById('txtClave').value;
            
    if (txtUsuario== '')
        {   
            alert("Ingresar el Usuario por favor!!!");
            document.getElementById('txtUsuario').focus();
            return;
        }
    else
        {
         if (txtClave == '')
            {   
                alert("Ingresar el Password por favor!!!");
                document.getElementById('txtClave').focus();
                return;
            }
        else
            {
                document.form.action="../Controlador/"+controlador;
                document.form.method="POST";
                document.form.op.value=op;
                document.form.submit();
            }
        }
            
}

//    opcioones del menu
function OpcionesMenu(controlador,op)
{
    document.form.action="../Controlador/"+controlador;
    document.form.method="Post";
    document.form.op.value=op;
    document.form.submit();
}



//    mantenimiento
function mantenimiento(controlador,op,codigo)
{
    document.form.action="../Controlador/"+controlador;
    document.form.method="Post";
    document.form.op.value=op;
    document.form.codigo.value=codigo;
    document.form.submit();  
}



// ajax de JQuery
function __ajax(direccion,metodo,tipodata,datos){
  var ajax = $.ajax({
    url: direccion,
    type: metodo,
    dataType: tipodata,
    data: datos
  });
  return ajax;
}

function __ajaxImg(direccion,metodo,datos){
  var ajax = $.ajax({
    url: direccion,
    type: metodo,
    data: datos,
    contentType: false,
    processData: false
  });
  return ajax;
}


function CargarMenu()
{
    $(".dashboard-sideBar-Menu").load("./frmMenu.php");
}

function  TotalOpcionesModulos(pagina) 
{
    $("#ContenidoModulo").load(pagina);
}


function  OpcionesModulos(pagina,op,cod) 
{
    $("#imgloading").css("display", "block");

    $("#ContenidoModulo").load("../Controlador/"+pagina+"?op="+op+"&cod="+cod);
}


function  SubOpcionesModulos(pagina,op,op2,cod) 
{
    $("#imgloading").css("display", "block");
    $("#ContenidoModulo").load("../Controlador/"+pagina+"?op="+op+"&op2="+op2+"&cod="+cod);
}

function  Opciones(div,pagina) 
{
    $(div).load(pagina);
}


//validaciones
function validaNumericos(event) 
{
    if(event.charCode >= 48 && event.charCode <= 57)
    {
        return true;

    }
    return false;        
}

function validaLetras(event) 
{
    if(event.charCode >= 48 && event.charCode <= 57)
    {
        return false;

    }
    return true;        
}

function validaSinEspacio(event) 
{
    if(event.charCode == 32)
    {
        return false;

    }
    return true;        
}

function MostrarNotificacion(titulo,texto,clase){
     $.gritter.add({
         title: titulo,
         text: texto,
         class_name: clase
     });
}
