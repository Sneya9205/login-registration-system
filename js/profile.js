console.log("Profile JS loaded");
console.log("Token:",localStorage.getItem("token"));
 
$(document).ready(function(){
    if(!localStorage.getItem("token")){
       window.location.href = "login.html";
    }
    $("#profileForm").submit(function(e){
        e.preventDefault();
        console.log("submitted");

        var token = localStorage.getItem("token");
        var formData = $(this).serialize();
        formData += "&token=" + token;
        $.ajax({
        url: "http://localhost/GUVI/web_app/php/profile.php",
        type: "POST",
        dataType: "json",
        data: formData,
        success: function(res){
        try{
            if(res.message){
                console.log(res.message);
                alert("Profile saved!");
            }
            if(res.status === "invalid"){
                console.log("invalid");
            localStorage.removeItem("token");
            window.location.href = "login.html";
            }
        }
        catch(e){
            $("#message").html(response);}
        },

        error:function(xhr, status, error){
        console.log("STATUS:", status);
        console.log("ERROR:", error);
        console.log("RESPONSE:", xhr.responseText);
        $("#message").html("Server Error");
        }

     });

    });

});