
<html>
    <head>
        <title> Registration </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    
        <!-- style below represents inline Css -->
        <style>
            html, body{
                margin : 0;
                padding : 0;
            }
            
            .form, table{
                max-width : 800px;
                min-width : 600px;
                width : auto;
                background-color : #CAFAE3;
                margin : 0 auto;
                margin-top : 20px;
                text-align : center;
                border : 1px solid #FFFFFF;
                color : black;
                letter-spacing: 0.1em;
                font-size : 20px;
                text-transform: uppercase;
            }
            
            td{
                padding : 15px;
            }
            
            .center{
                text-align: left;
                color : black;
                font-size : 14px;
            }
            input{
                border-radius: 6px;
                
            }
            .button{
                border-radius : 6px;
                padding : 5px;
                margin : 0 auto;
                background-color : white;
            }
            
            .error{
                color : red;
                font-style: italic;
                font-size : 12px;
                letter-spacing : 0.03em;
                text-transform: none;
            }
        </style>
        <script>
            $(document).ready(function(){
                var nameValid = false;
                var emailValid = false;
                var passwordValid = false;
            });
            function submitForm(){
                var username = $('#registerUsername').val();
                checkUser(username);
                
                var email = $('#registerEmail').val();
                checkEmail(email);
                
                var password = $('#registerPassword').val();
                var password2 = $('#registerPassword2').val();
                
                checkPassword(password, password2);
                setTimeout(function() {
                    if( emailValid == true && passwordValid == true && nameValid == true){

                        
                        $.ajax({
                            type : 'POST',
                            url : '/Access/Register',
                            data : {
                                "_token" : "{{ csrf_token() }}",
                                "username" : username,
                                "email" : email,
                                "password" : password,
                            },
                            datatype : 'json',
                            success: function(data){
                                        alert('valid post');
                                        console.log(data.username);
                                }
                        
                        }); 
                        
                    }else{
                    console.log('something wrong');
                    }
                }, 700);
  
            }
            
            function checkEmail(emailAddress){
                if(emailAddress == ''){
                    emailValid = false;
                    $('#emailError').html('Email cannot be empty');
                }
                var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                
                if(pattern.test(emailAddress) == true){
                    $('#emailError').html('');           
                    emailValid = true;
                }else{
                    $('#emailError').html('Email is invalid');  
                    emailValid = false;
                }
                
                return pattern.test(emailAddress);
            }
            
            function checkUser(username){
                if(username == ''){
                    nameValid = false;
                    $('#usernameError').html('Username cannot be empty');
                }else{
                    $.ajax({
                            type : 'POST',
                            url : '/Validation/Username',
                            data : {
                                "_token" : "{{ csrf_token() }}",
                                "username" : username,
                               
                            },
                            datatype : 'json',
                            success: function(data){                                     
                                        if(data.getUser){
                                            $('#usernameError').html('User already exists');
                                            nameValid = false;
                                        }else{
                                            $('#usernameError').html('');
                                            nameValid = true;
                                        }                        
                                    }
                        
                        });   
                }
            }
            
            function checkPassword(password, password2){
                
                if(password != password2){
                    $('#passwordError').html('Password does not match');
                    passwordValid = false;
                    return false;  
                }else if( password == '' || password2 == ''){
                    $('#passwordError').html('Password cannot be empty');
                    passwordValid = false;
                    return false;
                }
                
                $('#passwordError').html('');
                passwordValid = true;
                return true;
            }
        </script>
        
    </head>
    <body>
        <div class="wrapper">
            <form method="POST">
                <table class="form">
                    <tr class="first td">
                        <td colspan="2"> Registration </td>
                    </tr>
                    <tr>
                        <td class="center"> Username </td>
                        <td> <input type="text" name="username" id="registerUsername" placeholder="username.." required>
                                <div class="error" id="usernameError"> </div></td>     
                    </tr>
                    <tr>
                        <td class="center"> Email </td>
                        <td> <input type="email" name="email" id="registerEmail" placeholder="email.." required>
                                <div class="error" id="emailError"> </div></td>   
                    </tr>
                    <tr>
                        <td class="center"> Password </td>
                        <td> <input type="password" name="password" id="registerPassword" required></td>
                    </tr>
                    <tr>
                        <td class="center"> Re confirm password </td>
                        <td> <input type="password" name="password2" id="registerPassword2" required>
                            <div class="error" id="passwordError"> </div></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="button" onclick="submitForm()"> Join </div>
                        </td>
                    </tr>
                    {{ csrf_field() }}
                </table>
            </form>
        </div>
    </body>
</html>

