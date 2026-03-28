console.log("JS loaded");
    $(document).ready(function(){
        $("#submit").click(function(e){
            e.preventDefault();
            var name = $("#uname").val().trim();
            var mail = $("#umail").val().trim();
            var pwd  = $("#pwd").val().trim();
            if(name === "") {
                alert("Name cannot be empty");
                return;
            }
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailPattern.test(mail)) {
                alert("Enter a valid email");
                return;
            }
            if(pwd.length < 6) {
                alert("Password must be at least 6 characters");
                return;
            }
            var pwdPattern = /^(?=.*[A-Za-z])(?=.*\d).{6,}$/;
            if(!pwdPattern.test(pwd)) {
                alert("Password must contain letters and numbers");
                return;
            }
            $.ajax({
                url:"http://localhost/GUVI/web_app/php/register.php",
                type:"POST",
                data:{"name":name,"email":mail,"password":pwd},
                success:function(result){
                    console.log(result);
                    alert("Registered user");
                    window.location.href="http://localhost/GUVI/web_app/login.html";
                }
            });
        });
    });
