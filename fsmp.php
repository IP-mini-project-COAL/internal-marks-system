<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link type="text/css" rel="stylesheet" href="style_fsmp1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
        <header>
            <div class="logo"><a href="https://www.vcet.edu.in/"><i class="fas fa-university"></i> VCET</a></div>
            
                <nav>
                    <ul>
                        <li>
                            <div>
                                About
                            </div>
                        </li>
                        <li>
                            <div>
                               Support
                            </div>
                        </li>
                        <li>
                            <div id="name-btn" class="name-btn"></div>
                            <div id="l_btn" class="l_btn">
                                Log In / Register 
                            </div>
                        </li>
                        
                    </ul>
                </nav>
                <div class="menu-toggle" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
      
        </header>
        <br>
        <br>
        <br>
        <div class="s-wrap" id="s-wrap">

        <div class="filter_bar">
            <!--form method="post" name="form" action="filter.php"-->
            <div class="ads">
                <input type="text" list="AY" name="ayear" id="ayear">
                <label class="title" for="ayear" > AY:</label>
                <datalist id="AY">
                    <option value="2018-19">
                    <option value="2019-20">

                </datalist>
            </div>
         
            <div class="ads" id="departamento">
                <input type="text" list="department" name="dept" id="dept">
                <label class="title"  for="dept"> Department:</label>
                <datalist id="department">
                    <option value="Computer Engineering">
                    <option value="Information Technology">
                    <option value="Electronics And Telecommunication">
                    <option value="Mechanical Engineering">
                    <option value="Civil Engineering">
                    <option value="Instrumentation Engineering">
                    <option value="Data Science">
                    <option value="Artificial Intelligence">    
                </datalist>
            </div>
         
            <div id="filter_button">
                <button type=submit class="fb" id="fb">Filter</button>
            </div>
            <!--/form--> 
        </div>
        <br>
        <div class="main-content">
            
            <header id="main-content-header"><span>SUBJECTS</span></header>
            <br>
            <div class="before_login" id="b_l">LOGIN IS REQUIRED TO CONTINUE</div>
            <div class="content" id="content">
                <div class="multiple"  id="part1"></div><div class="multiple"  id="part2"></div><div class="multiple"  id="part3"></div><div class="multiple" id="part4"></div><div class="content1"><div class="single" id="part5"></div></div>
            </div>
        </div>
        </div>
        <div class="hide">
        <div class="register" id="register">
        <div class="register-box" id="reg_box">
        <div class="login-signup">
            <div id="login-button">Login</div>
        </div>
        
        <h2>Registration</h2>
        <form class="registration">
        
        <div class='name-box'>
            <span class="honor">
            <select name="honorifics" id="hr">
                <option value="Prof.">Prof.</option>
                <option value="Dr.">Dr.</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Dr.">Dr.</option>
            </select></span>
            <span class="nm_input">
            <input placeholder="Name" type="text" name='tname' class="register-input" id="tr_name" >
        </span></div><p class="error" id="name_error"></p>
        <div class='input-box'>
            <input placeholder="ID" type="text" name='tid' class="register-input" id="t_id"  maxlength="" >
            
        </div>
        <p class="error" id="id_error"></p>
        <div class='input-box'>
            <input placeholder="Username" type="text" name='username' class="register-input" id="tr_uname" title="Can inlcude '@', '_', '.', numbers, uppercase and lowercase characters" >
            
        </div>
        <p class="error" id="username_error"></p>
        
        <div class='input-box'>
            <input placeholder="Password" type="password" name='pass' class="register-input" id="signup-password" >
            <span class='eye' onclick='signin_pass()'>
                <i id='hide1' class="fa fa-eye"></i>
                <i id='hide2' class="fa fa-eye-slash"></i>
            </span>
            
        </div>
        <p class="error" id="pass_error"></p>
        <div class="signup-btn">
        <input class="SignIn" type="button" name="signup-btn" id="sign-btn" value="Sign up">
        </div>
        <div class="result">
        <p id="result"></p></div>
        </form>
        <i class="fas fa-times-circle" id="close"></i>
    </div>
    <div class="login-box" id="log_box">
        
            <div class="login-signup">
                <div id="register-button">Register</div>
            </div>
            
            <h2>Log In</h2>
            <form>
            <div class='input-box'>
                <input placeholder="Username" type="text" id="tl_uname" class="login-input" name='username'>
            </div>
            <div class='input-box'>
                <input placeholder="Password" type="password" class="login-input" id="login-password" name='pass' >
                <span class='eye' onclick='login_pass()'>
                    <i id='hide3' class="fa fa-eye"></i>
                    <i id='hide4' class="fa fa-eye-slash"></i>
                </span>
            </div>
            
            <div class="forgot" align="center"><a href="forgot.php" ><u>Forgot Password?</u></a></div>
            
            
            <div class="login-btn">
                <input  type="button" name="login-btn" id="log-btn" value="Log In">
            </div>
            <div class="result1">
            <p id="result1"></p>
            </div>
          </form>
          <i class="fas fa-times-circle" id="close1"></i>
        </div>
    </div>
      </div>
      <div class="logout" id="logout">
          <div class="logout_box" id="logout_box">
              <div class="namee" id="namee">
              </div>
              <div class="logout-btn" id="logout-btn"><p>Log Out <i class="fas fa-sign-out-alt"></i></p>
              </div>
              <i class="fas fa-times-circle" id="close2"></i>
          </div>

      </div>    
    </div>
    <script src = "logic_fsmp.js"></script>
    <script src="./script.php"></script>
</body>
</html>

