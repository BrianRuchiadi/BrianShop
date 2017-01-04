<!DOCTYPE html>
<html>
    <head>
        <title> Admin Register </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
        <style>
            body, html {
                padding : 0;
                margin : 0;
            }
            div{
                display : block;
            }
            
            table, tr, td{
                padding : 20px;
                margin : 10px;
                color : white;
            }
            input{
                border-radius : 6px;
                text-transform : uppercase;
                padding : 10px 30px;   
                color : black;
            }
            input[type='submit']{
                background-color : orange;
            }
            .wrapper {
                height : 100vh;
                width : 100vw;
                background-color : transparent;
                text-transform: uppercase;
            }
            
            .login.box {
                position : absolute;
                top : 50%;
                left : 50%;
                height : 500px;
                width : 450px;
                background-color : black;
                transform : translate(-50%, -50%);
                border-radius : 10px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="login box">
                <form method="post">
                <table>
                    <tr>
                        <td> Username </td>
                        <td> <input type="text" name="username" required> </td>                
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td> <input type="email" name="email" required> </td>
                    </tr>
                    
                    <tr>
                        <td> Password </td>
                        <td> <input type="password" name="password" required> </td>                    
                    </tr>
                    <tr>
                        <td> Confirm Password </td>
                        <td> <input type="password" name="confirm_password" required> </td>
                    </tr>
                    {{ csrf_field() }}
                    <tr>
                        <td colspan="2"> <input type="submit" value="login"></td>
                    </tr>         
                </table>
                </form>
            </div>
        </div>
    </body>
</html>

