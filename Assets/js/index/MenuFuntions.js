
function SingUp(){

    document.getElementById('login').style.display="none";
    document.getElementById('btn-login-admin').style.display="none";
    document.getElementById("btn-login-back").style.display="none";

    document.getElementById('singup').style.display="";
    

}

function BackSingUp(){
    document.getElementById('singup').style.display="none";
    document.getElementById('btn-login-admin').style.display="";
    document.getElementById("btn-login-back").style.display="";
    document.getElementById('login').style.display="";
}

function LoginPanel(){
    document.getElementById('btn-login').style.display="none";
    document.getElementById("btn-login-back").style.display="";
    document.getElementById('login').style.display="";
    document.getElementById('btn-login-admin').style.display="";

}

function BackLoginPanel(){
    document.getElementById('btn-login').style.display="";
    document.getElementById("btn-login-back").style.display="none";
    document.getElementById('login').style.display="none";
    document.getElementById('btn-login-admin').style.display="none";

}
function AdminPanel(){

    document.getElementById("btn-login-back").style.display="none";
    document.getElementById('login').style.display="none";
    document.getElementById('btn-login-admin').style.display="none";

    document.getElementById("btn-loginAdmin-back").style.display="";
    document.getElementById("adminLogin").style.display="";


}
function BackLoginAdminPanel(){
    document.getElementById("btn-login-back").style.display="";
    document.getElementById('login').style.display="";
    document.getElementById('btn-login-admin').style.display="";

    document.getElementById("btn-loginAdmin-back").style.display="none";
    document.getElementById("adminLogin").style.display="none";

}




//Limpiar campos
function LimpiarVotante(){
    GetInfo();
    cedula.value='';

}
function SalirSession(){
    window.location.href = "closeAdminSession.php";
}


//Validaciones
function ValidarRegistroAdmin(){
    
    GetInfoAdminRegistro();


    if(cedulaRegistro.value == "" || cedulaRegistro.value  == null || cedulaRegistro.value  == undefined||
    passwordAdminRegistro.value == "" || passwordAdminRegistro.value  == null || passwordAdminRegistro.value  == undefined||
    password2AdminRegistro.value == "" || password2AdminRegistro.value  == null || password2AdminRegistro.value  == undefined||
    codigoRegistro.value == "" || codigoRegistro.value  == null || codigoRegistro.value  == undefined){
        alert("Rellene todos los campos")
    }
    else{
        if(passwordAdminRegistro.value == password2AdminRegistro.value){
            if(codigoRegistro.value == "1234" ){

                window.location.href = "index.php" + "?user=" + c + "&password=" + passwordAdminRegistro.value;       
            
            }
            else{
                alert("Codigo de registro incorrecto");
            }
        }
        else{
            alert("Las contraseña no coinciden");
        }
    }

}
function ValidarAdmin(){
    GetInfoAdmin();

    if(cedulaAdmin.value == "" || cedulaAdmin.value  == null || cedulaAdmin.value  == undefined||
    passwordAdmin.value == "" || passwordAdmin.value  == null || passwordAdmin.value  == undefined){
        alert("Rellene todo los campos");
    }
    else{
        document.forms['formAdmin'].submit(); 
        
    }
}
function ValidarVotante(){
    GetInfo();

    if(cedula.value == "" || cedula.value  == null || cedula.value  == undefined){
        alert("Rellene todo los campos")
    }
    else{
        window.location.href = "index.php" + "?cedula=" + c;

    }
}

//chequeo de datos
function checkCedula(c){

    let url=requestURL+c;

    request.open('GET', url);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var data = request.response;
        if (!data['ok']){
            alert("Cedula Invalida")
        }
      }

}

//Get infos
function GetInfo(){
    var cedula=document.getElementById('cedula');
    c=cedula.value.split('-').join('');
}



function GetInfoAdmin(){
    cedulaAdmin=document.getElementById('cedulaAdmin');
    var passwordAdmin=document.getElementById('passwordAdmin');
    c=cedula.value.split('-').join('');

}
function GetInfoAdminRegistro(){
    cedulaRegistro=document.getElementById('cedulaAdminRegistro');
    var passwordAdminRegistro=document.getElementById('passwordAdminRegistro');
    var password2AdminRegistro=document.getElementById('password2AdminRegistro');
    var codigoRegistro=document.getElementById('codigoRegistro');
    c=cedulaRegistro.value.split('-').join('');

}