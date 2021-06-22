
//Login Empleador
function GetEmpleadorInfo(){
    var user=document.getElementById('user');
    var password=document.getElementById('password');
}

function CheckLogin(){

    GetEmpleadorInfo()

    if(user.value == "" || user.value  == null || user.value  == undefined|| password.value == "" || password.value  == null || password.value  == undefined ){
        alert("Rellene los campos")
    }
    else{
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {'userEmpleador':user.value,'passwordEmpleador':password.value},
            success: function (data) {
                console.log(data)
                if (data[0]==0){
                    alert("Datos Incorrectos");
                }
                else{
                    window.location.href = window.location.href.replace("index.php", "Empleos/Empleador/menu.php");

                }
            }
            });
    }
    
}