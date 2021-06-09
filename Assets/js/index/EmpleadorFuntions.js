function ShowJobsEmpleador(){
    document.getElementById('btn-menu-back').style.display="";
    document.getElementById('btn-menu-add').style.display="none";
    document.getElementById('btn-menu-list').style.display="none";
    document.getElementById('btn-menu-exit').style.display="none";
    document.getElementById('btn-menu-list-apply').style.display="none";


    document.getElementById('tableEmpleos').style.display="";

}
function ShowApplyJobEmpleador(){
    document.getElementById('btn-menu-back-apply').style.display="";

    document.getElementById('btn-menu-add').style.display="none";
    document.getElementById('btn-menu-list').style.display="none";
    document.getElementById('btn-menu-exit').style.display="none";
    document.getElementById('btn-menu-list-apply').style.display="none";



    document.getElementById('allApplyEmpleador').style.display="";

}
function BackMenuEmpleador(){
    document.getElementById('btn-menu-back').style.display="none";
    document.getElementById('btn-menu-add').style.display="";
    document.getElementById('btn-menu-list').style.display="";
    document.getElementById('btn-menu-exit').style.display="";
    document.getElementById('btn-menu-list-apply').style.display="";


    document.getElementById('tableEmpleos').style.display="none";
}
function BackMenuApply(){
    document.getElementById('btn-menu-back-apply').style.display="none";
    document.getElementById('btn-menu-add').style.display="";
    document.getElementById('btn-menu-list').style.display="";
    document.getElementById('btn-menu-exit').style.display="";
    document.getElementById('btn-menu-list-apply').style.display="";


    document.getElementById('allApplyEmpleador').style.display="none";
}
function BackApplyJob(){
    
}

function GetInfoJobEmpleador(){
    var company =document.getElementById('company');
    var type =document.getElementById('type');
    var category =document.getElementById('category');
    var position =document.getElementById('position');
    var url =document.getElementById('url');
    var photo =document.getElementById('photo');
    var email =document.getElementById('email');
    var status =document.getElementById('status');
    var description =document.getElementById('description');
}

function ResetInfoJobEmpleador(){
    document.getElementById('name').value="";
    document.getElementById('company').value="";
    document.getElementById('category').value="Seleccione una opcion:";
    document.getElementById('type').value="Seleccione una opcion:";
    document.getElementById('position').value="";
    document.getElementById('url').value="";
    document.getElementById('photo').value="";
    document.getElementById('email').value="";
    document.getElementById('status').value="Activo";
    document.getElementById('description').value="";


}

function AddJobEmpleador(){
    document.getElementById('empleadorOption').style.display="none";
    document.getElementById('addJob').style.display="";

}
function ApplyJob(){
    document.getElementById('infoEmpleo').style.display="none";
    document.getElementById('applyJob').style.display="";

}
function BackApplyJob(){
    document.getElementById('applyJob').style.display="none";
    document.getElementById('infoEmpleo').style.display="";

}
function SendApplyJob(){
    var nameJob2 =document.getElementById('nameJob');
    var lastname2 =document.getElementById('lastname');
    var gender2 =document.getElementById('gender');
    var location2 =document.getElementById('location');
    var url2 =document.getElementById('url');
    var email2 =document.getElementById('email');
    var curriculum2 =document.getElementById('curriculum');
    var description2 =document.getElementById('description');


    if(nameJob2.value == "" || nameJob2.value  == null || nameJob2.value  == undefined|| lastname2.value == "" || lastname2.value  == null || lastname2.value  == undefined||
    gender2.value == "Seleccione una opcion:" || location2.value == "" || location2.value  == null || location2.value  == undefined||
    url2.value == "" || url2.value  == null || url2.value  == undefined|| curriculum2.value == "" || curriculum2.value  == null || curriculum2.value  == undefined ||
    email2.value == "" || email2.value  == null || email2.value  == undefined|| description2.value == "" || description2.value  == null || description2.value  == undefined){
        alert("Rellene los campos")
    }
    else{
        alert('Informacion Enviada'); 
        document.forms['formApplyJob'].submit();
    }
}
function BackAddJobEmpleador(){
    document.getElementById('empleadorOption').style.display="";
    document.getElementById('addJob').style.display="none";
}
function CheckAddJobEmpleador(){

    GetInfoJobEmpleador();
    var nameJob =document.getElementById('name');
    var location =document.getElementById('location');

    if(nameJob.value == "" || nameJob.value  == null || nameJob.value  == undefined|| company.value == "" || company.value  == null || company.value  == undefined||
    type.value == "Seleccione una opcion:" ||category.value == "Seleccione una opcion:" ||
    position.value == "" || position.value  == null || position.value  == undefined|| location.value == "" || location.value  == null || location.value  == undefined||
    url.value == "" || url.value  == null || url.value  == undefined|| photo.value == "" || photo.value  == null || photo.value  == undefined ||
    email.value == "" || email.value  == null || email.value  == undefined|| description.value == "" || description.value  == null || description.value  == undefined){
        alert("Rellene los campos")
    }
    else{
        document.forms['formEmpleo'].submit();
        alert('Puesto Agregado'); 
    }
}
function CloseInfoEmpleo(){
    close();

}

function ExitEmpleador(){
    $.ajax({
        url: 'menu.php',
        type: 'POST',
        data: {'exitEmpleador':'true'}
        
      });
      window.location.href = window.location.href.replace("Empleos/Empleador/menu.php", "index.php");

}   