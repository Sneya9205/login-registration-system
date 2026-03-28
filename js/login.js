 console.log("Login Js loaded");
 $(document).ready(function(){
    $("#submit").click(function(e){

    e.preventDefault();
    console.log("submit triggered");
    var mail=$("#email").val();
    var pwd=$("#pwd").val();

    $.ajax({
        url:"http://localhost/GUVI/web_app/php/login.php",
        type:"POST",
        data:{"email":mail,"password":pwd},
        dataType:"json",
        success: function(result){
            console.log(result.redis); 
            if (result.token==""){
                console.log("No token");
                console.log(result);
            }
            else{
                console.log("Logged in");
                localStorage.setItem("token",result.token);
                console.log("Token:",result.token);
                alert(result.message);
                window.location.href="http://localhost/GUVI/web_app/profile.html"}
        },
        error:function(xhr, status, error){
        console.log("ERROR:");
        console.log("Status:", status);
        console.log("Error:", error);
        console.log("Response:", xhr.responseText);
        }
    });

});
 });