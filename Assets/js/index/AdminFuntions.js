
function GetAdminInfo(){
    var userAdmin=document.getElementById('userAdmin');
    var passwordAdmin=document.getElementById('passwordAdmin');
}

function CheckAdmin(){
    GetAdminInfo()

    if(userAdmin.value == "" || userAdmin.value  == null || userAdmin.value  == undefined|| passwordAdmin.value == "" || passwordAdmin.value  == null || passwordAdmin.value  == undefined ){
        alert("Rellene los campos")
    }
    else{
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {'userAdmin':userAdmin.value,'passwordAdmin':passwordAdmin.value},
            success: function (data) {
                console.log(data[0])
                if (data[0]==0){
                    alert("Datos Incorrectos");
                }
                else{
                    window.location.href = window.location.href.replace("index.php", "Empleos/Admin/menu.php");

                }
            }
          });
    }
}

function ClearInfo(){

}