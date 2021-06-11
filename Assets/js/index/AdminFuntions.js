
//Login Admin
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

//Limitar puestos en el index
function LimitJobsIndex(){

    var limit = prompt("Limite de puestos:");
    if (limit != null && Number.isInteger(parseInt(limit))) {
        $.ajax({
            url: 'menu.php',
            type: 'POST',
            data: {'limitJobs':limit}
          });
    }
    else{
        alert("error")
        LimitJobsIndex()
    }

}


//Gestionar Puesto
function JobsPanel(){
    document.getElementById('adminOpcion').style.display="none";
    document.getElementById('jobsPanel').style.display="";
    document.getElementById('jobsTable').style.display="";


}
function BackCategoryJobs(){
    document.getElementById('adminOpcion').style.display="";
    document.getElementById('jobsPanel').style.display="none";
    document.getElementById('jobsTable').style.display="none";

}
function EditJob(data){
    document.getElementById('idRelease').value=data[0];
    document.getElementById('nameRelease').value=data[1];
    document.getElementById('company').value=data[2];
    document.getElementById('type').value=data[3];
    document.getElementById('category').value=data[4];
    document.getElementById('position').value=data[5];
    document.getElementById('location').value=data[9];
    document.getElementById('url').value=data[6];
    document.getElementById('email').value=data[7];
    document.getElementById('status').value=data[11];
    document.getElementById('description').value=data[10];
}

function DeleteJob(id){
    document.getElementById('job-id-delete').value=id;
}

function ReleaseJob(){
    var nameJob =document.getElementById('nameRelease');
    var company =document.getElementById('company');
    var type =document.getElementById('type');
    var category =document.getElementById('category');
    var position =document.getElementById('position');
    var url =document.getElementById('url');
    var photo =document.getElementById('photo');
    var email =document.getElementById('email');
    var status =document.getElementById('status');
    var description =document.getElementById('description');
    var location =document.getElementById('location');

    if(nameJob.value == "" || nameJob.value  == null || nameJob.value  == undefined|| company.value == "" || company.value  == null || company.value  == undefined||
    type.value == "Seleccione una opcion:" ||category.value == "Seleccione una opcion:" ||
    position.value == "" || position.value  == null || position.value  == undefined|| location.value == "" || location.value  == null || location.value  == undefined||
    url.value == "" || url.value  == null || url.value  == undefined|| photo.value == "" || photo.value  == null || photo.value  == undefined ||
    email.value == "" || email.value  == null || email.value  == undefined|| description.value == "" || description.value  == null || description.value  == undefined){
        alert("Rellene los campos")
    }
    else{
        alert('Puesto Actualizado'); 
        document.forms['releaseJob'].submit();
    }
}

//Category Panel
function CategoryPanel(){
    document.getElementById('adminOpcion').style.display="none";
    document.getElementById('categoryPanel').style.display="";
    document.getElementById('categoryTable').style.display="";


}
function BackCategory(){
    document.getElementById('categoryPanel').style.display="none";
    document.getElementById('categoryTable').style.display="none";

    document.getElementById('adminOpcion').style.display="";

}
function EditCategory(nameCategory,id){
    document.getElementById('category-name-release').value=nameCategory;
    document.getElementById('category-id-release').value=id;

}
function DeleteCategory(id){
    document.getElementById('category-id-delete').value=id;
}

//Extras
function ExitAdmin(){
    $.ajax({
        url: 'menu.php',
        type: 'POST',
        data: {'admin':'true'}
        
      });
      window.location.href = window.location.href.replace("Empleos/Admin/menu.php", "index.php");

}   