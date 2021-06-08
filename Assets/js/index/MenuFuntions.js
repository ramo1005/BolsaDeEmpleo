
function BackSearch(){
    
    window.location.href = window.location.href.replace(window.location.search, "").replace("search", "index")

}
function BackMoreEmpleos(){
    
    close()
}


function Filter(){
    window.location.href = window.location.href + "?filter="+document.getElementById('filter').value;

}
function ClearFilter(){
    window.location.href = window.location.href;

}

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
    document.getElementById('allJobs').style.display="none";
    document.getElementById("filter").style.display="none";
    document.getElementById("btn-login-filter").style.display="none";
    document.getElementById("search").style.display="none";

    document.getElementById("btn-login-back").style.display="";
    document.getElementById('login').style.display="";
    document.getElementById('btn-login-admin').style.display="";

}

function BackLoginPanel(){
    document.getElementById('btn-login').style.display="";
    document.getElementById('allJobs').style.display="";
    document.getElementById("filter").style.display="";
    document.getElementById("btn-login-filter").style.display="";
    document.getElementById("search").style.display="";

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



