
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
    }
}