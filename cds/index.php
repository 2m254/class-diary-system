<!doctype html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta http_equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" media="screen" href="anmtn/back_style.css" />
		
        <link rel="stylesheet" href="styles.css">
        <title>Login -CDS</title>
	</head>
	<body class="login-background">
        <div class="slider">
        <div class="load">
            

        <div id="navbar">
   
   

    <h1>Class Diary System</h1>
    



		<?php include('Common/common-header.php')?>
        <div class="login-div mt-3 rounded">
            <div class="logo-div text-center">
                <img src="images/lock.png" alt="" class="align-items-center" width="100" height="100">
            </div>
            <div class="login-padding">
                <h2 class="text-center text-white">LOGIN</h2>
                <form class="p-1" action="login.php" method="POST">
                    <div class="form-group">
                        <label><h6>Enter Your Email:</h6></label>
                        <input type="text" name="email" placeholder="Enter User ID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label><h6>Enter Your Password:</h6></label>
                        <input type="Password" name="password" placeholder="Enter Password" class="form-control border-bottom" required>
                       
                    </div>
                    <div class="form-group text-center mb-3 mt-4">
                    <div class="form-group mt-20">
                                                    		
                                                           
                                                    			<button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                    </div>
                    </div></div>
                </form></div></<div>
            
                </div>
            </div></div>
        </div>
    </body>
</html>



