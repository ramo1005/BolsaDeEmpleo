
//Modulo de Registro
function GetInfoSingUp(){
    var nameSingUp=document.getElementById('nameSingUp');
    var companySingUp=document.getElementById('companySingUp');
    var email=document.getElementById('emailSingUp');
    var userSingUp=document.getElementById('userSingUp');
    var passwordSingUp1=document.getElementById('passwordSingUp1');
    var passwordSingUp2=document.getElementById('passwordSingUp2');


}

function clearInfoSingUp(){
    document.getElementById('nameSingUp').value="";
    document.getElementById('companySingUp').value="";
    document.getElementById('emailSingUp').value="";
    document.getElementById('userSingUp').value="";
    document.getElementById('passwordSingUp1').value="";
    document.getElementById('passwordSingUp2').value="";
}


function CheckSingUp(){
    GetInfoSingUp()
    if(nameSingUp.value == "" || nameSingUp.value  == null || nameSingUp.value  == undefined|| companySingUp.value == "" || companySingUp.value  == null || companySingUp.value  == undefined|| 
       emailSingUp.value == "" || emailSingUp.value  == null || emailSingUp.value  == undefined||
       userSingUp.value == "" || userSingUp.value  == null || userSingUp.value  == undefined|| passwordSingUp1.value == "" || passwordSingUp1.value  == null || passwordSingUp1.value  == undefined||
       passwordSingUp2.value == "" || passwordSingUp2.value  == null || passwordSingUp2.value  == undefined){
        alert("Rellene los campos")
    }
    else{
        if(passwordSingUp1.value != passwordSingUp2.value){
            alert("Las contraseñas no coinciden...")
        }
        else{
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: {'name':nameSingUp.value,'company':companySingUp.value,'email':emailSingUp.value,'user':userSingUp.value,'password':passwordSingUp1.value}

            
            });
            alert("Registro Exitoso");
            clearInfoSingUp();
            BackSingUp();
        }
    }
}