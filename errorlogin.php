<!DOCTYPE html>

<?php
//error_reporting(0);
//login part
session_start();
include('db.php');

if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from login where email='".$uname."'AND pass='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION["username"] = $uname;
      
         $query1=mysqli_query($con,"select * from login where email='".$_SESSION["username"]."' ");
    {
        $row=mysqli_fetch_assoc($query1);
 
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["lname"] = $row["lname"];
        $_SESSION["phcode"] = $row["phcode"];
        $_SESSION["mobile"] = $row["mobile"];
        $_SESSION["dob"] = $row["dob"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["gender"] = $row["type"];
        $_SESSION["addr1"] = $row["addr1"];
        $_SESSION["addr2"] = $row["addr2"];
        $_SESSION["city"] = $row["city"];
        $_SESSION["state"] = $row["state"];
        $_SESSION["pincode"] = $row["pincode"];
    }

        echo "<script>alert('welcome {$_SESSION["fname"]} {$_SESSION["lname"]} '); window.location.assign('main.php'); </script>";
        exit();
        
    }
    
    else
    {
         echo "<script>alert('Invalid User Credentials'); window.location.assign('errorlogin.php'); </script>";
        exit();
        
    }
    
}

//registration part
if($con)
{
    echo"";
}

 if(isset($_POST['submit']))
{   
   $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phcode=$_POST['phcode']; 
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $addr1=$_POST['addr1'];
    $addr2=$_POST['addr2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $gender=$_POST['type']; 
    $pass=$_POST['pwd1'];

     $query="INSERT INTO login(fname,lname,phcode,mobile,dob,email,addr1,addr2,city,state,pincode,type,pass) VALUES('$fname', '$lname','$phcode', '$mobile', '$dob', '$email','$addr1','$addr2','$city','$state','$pincode','$gender', '$pass');";
    
    $data=mysqli_query($con,$query);
     
    if($data)
    {
        
     echo "<script> alert('Registration Successful'); window.location.assign('loginmain.php'); </script>"; 
        exit();
    }
      
    
   else
    {
       echo "<script>
alert('email already registered');
   window.location.assign('loginmain.php'); 
</script>";
    }
  }
?>

<html>
<head>
    <title>login culrz</title>
    <link rel="stylesheet" href="css/loginmain.css">
</head>
    <body>
        <div class="navbar-fixed">
    
          <a href="#" class="navbar-brand" ><img src="img/logod.png" style="max-width:150px "></a></div>
    <div class="login-page">
        <div class="form">
        <img src="img/icored2.png" class="avatar">
        
    <!-- REGISTERFORM -->        
            
        <form class="register-form" action="#" method="POST">
        <h3>REGISTER-FORM</h3>
        <input type="text" placeholder="First name" name="fname" required/>   
        <input type="text" placeholder="Last name" name="lname" required/>
          <bold>+</bold><select name="phcode">
                <option value="86">86</option>
                <option value="64">64</option>
                <option value="98">98</option>
                <option value="90">90</option>
                <option value="80">80</option>
                <option value="97">97</option>
                <option value="72">72</option>
                <option value="40">40</option>
                <option value="65">65</option>
                <option value="87">87</option>
                <option value="85">85</option>
            
          </select>
        <input type="text" name="mobile" placeholder="Enter Mob no" maxlength="12" required/>
        <label for="start">DATE OF BIRTH</label>
        <input type="date" value="DD/MM/YYYY" name="dob" required />
        <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email (username)"> 

             
              <input type="text" name="addr1" placeholder="Address Line 1" maxlength="50" required/>
             <input type="text" name="addr2" placeholder="Address Line 2" maxlength="50" required/>
             <input type="text" name="city" placeholder="City" maxlength="15" required/>
             <input type="text" name="state" placeholder="State" maxlength="15" required/>
             <input type="number" name="pincode" placeholder="Pin Code" max="999999" required/>
 
        
            <input id="field_pwd1" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd1" placeholder="Enter Password">

             <input id="field_pwd2" title="Please enter the same Password as above." type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd2" placeholder="Confirm password">
            
            
        <div id="genderContainer" name="genderContainer" class="genderlist">
        <div id="gender" class="gender">
        <label for="male"> <input name="type" type="radio" value="male" />  MALE  </label>
        </div>
         <div id="gender" class="gender">
         <label for="female"> <input name="type" type="radio" value="female" /> FEMALE </label>
         </div>
         <div id="gender" class="gender">
         <label for="others"> <input name="type" type="radio" value="others"/> OTHERS </label>
         </div>
         </div>
            <button type="submit" value="submit" name="submit" >SUBMIT</button>
        <p class="message">Already Registered?<a href="#" >Login</a></p><br><br>
        <p class="message">Skip Login??<a href="main11.php" >Click here</a></p>
            
        </form>
        
            <!-- LOGIN FORM -->
        <form class="login-form" method="POST" action="#">
            <h3>LOGIN</h3>
            <input type="text" placeholder="username" name="username" required/>
            <input type="password" placeholder="password" name="password" required/>
            <button>login</button>
             <font size="5px" color="white">**INVALID CREDENTIALS!!**</font>
            <p class="message">Not Registered?<a href="#"> Register</a></p><br>
            <p class="message">Skip Login??<a href="main11.php" >Click here</a></p><br><br>
            <p class="message"><a href="admin.php">ADMIN LOGIN</a></p>
            
            </form>
        </div>
        </div>
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'> </script>
        
        <script>
        
        $('.message a').click(function(){
         $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });                             
                              
                              
        </script>
      
       <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  
        </body>
</html>

<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

<script type="text/javascript">

  document.addEventListener("DOMContentLoaded", function() {

    // JavaScript form validation

    var checkPassword = function(str)
    {
      var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
      return re.test(str);
    };

    var checkForm = function(e)
    {
      if(this.username.value == "") {
        alert("Error: Username cannot be blank!");
        this.username.focus();
        e.preventDefault(); // equivalent to return false
        return;
      }
      re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if(!re.test(this.username.value)) {
        alert("Error: email shuold contain @");
        this.username.focus();
        e.preventDefault();
        return;
      }
      if(this.pwd1.value != "" && this.pwd1.value == this.pwd2.value) {
        if(!checkPassword(this.pwd1.value)) {
          alert("The password you have entepink is not valid!");
          this.pwd1.focus();
          e.preventDefault();
          return;
        }
      } else {
        alert("Error: Please check that you've entepink and confirmed your password!");
        this.pwd1.focus();
        e.preventDefault();
        return;
      }
      alert("Both username and password are VALID!");
    };

    var myForm = document.getElementById("myForm");
    myForm.addEventListener("submit", checkForm, true);

    // HTML5 form validation

    var supports_input_validity = function()
    {
      var i = document.createElement("input");
      return "setCustomValidity" in i;
    }

    if(supports_input_validity()) {
      var usernameInput = document.getElementById("field_username");
      usernameInput.setCustomValidity(usernameInput.title);

      var pwd1Input = document.getElementById("field_pwd1");
      pwd1Input.setCustomValidity(pwd1Input.title);

      var pwd2Input = document.getElementById("field_pwd2");

      // input key handlers

      usernameInput.addEventListener("keyup", function(e) {
        usernameInput.setCustomValidity(this.validity.patternMismatch ? usernameInput.title : "");
      }, false);

      pwd1Input.addEventListener("keyup", function(e) {
        this.setCustomValidity(this.validity.patternMismatch ? pwd1Input.title : "");
        if(this.checkValidity()) {
          pwd2Input.pattern = RegExp.escape(this.value);
          pwd2Input.setCustomValidity(pwd2Input.title);
        } else {
          pwd2Input.pattern = this.pattern;
          pwd2Input.setCustomValidity("");
        }
      }, false);

      pwd2Input.addEventListener("keyup", function(e) {
        this.setCustomValidity(this.validity.patternMismatch ? pwd2Input.title : "");
      }, false);

    }

  }, false);

</script>





