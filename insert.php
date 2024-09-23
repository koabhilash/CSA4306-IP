<!DOCTYPE html>
<html>
  <head>
    <meta chartset="UTF - 8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <title>Donor Registration</title>
    <style>
      *{
        font-family:"poppins",sans-serif;
        box-sizing:border-box;
      }
      body{
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
        background-image:url('blood8.jpg');
        background-repeat: no-repeat;  
        background-size: cover;
      }
      .wrapper{
        width:38%;
        height:650px;
        padding:30px 40px;
        background-color: white;
        border-radius:5px;
        box-shadow:0px 0px 10px 0px rgb(113, 99, 99);
      }
      .wrapper h3{
        text-align: center;
        font-size: 30px;
      }
      .ne{
        display:flex;
        justify-content:space-around;
        padding:20px 10px;
        margin-top:-30px;
      }
      .wrapper h5{
        margin-bottom:10px;
      }
      .ne input{
        width:100%;
        border-radius:5px;
        padding: 5px 7px;
        margin-top:-50px;
      }
      .ne input:hover{
        box-shadow: 0px 0px 10px 0px rgb(152, 121, 121);
      }
      .pc{
        display:flex;
        justify-content: space-around;
        padding:0px 10px;
        margin-top:-20px;
      }
      .pc input{
        border-radius:5px;
        padding: 5px 7px;
        margin-top:-50px;
      }
      .pc input:hover{
        box-shadow: 0px 0px 10px 0px rgb(152, 121, 121);
      }
      .lc{
        display:flex;
        justify-content: space-around;
        padding:10px 10px;
        margin-top:-10px;
      }
      .lc input{
        border-radius:5px;
        padding: 5px 7px;
        margin-top:-50px;
      }
      .lc input:hover{
        box-shadow: 0px 0px 10px 0px rgb(152, 121, 121);
      }
      .pb{
        display:flex;
        justify-content:space-around;
        padding:10px 10px;
        margin-top:-15px;
      }
      .pb input{
        border-radius:5px;
        padding: 5px 7px;
        margin-top:-50px;
      }
      .pb input:hover{
        box-shadow: 0px 0px 10px 0px rgb(152, 121, 121);
      }
      .bd select{
        border-radius:5px;
        padding: 5px 7px;
        width:180px;
        margin-top:-50px;
      }
      .bd select:hover{
        box-shadow: 0px 0px 10px 0px rgb(152, 121, 121);
      }
      .gen{
        display:flex;
        justify-content: baseline;
      }
      .gen h5{
        margin-left:40px;
        margin-top:20px;
      }
      .g{
        font-size:14px;
        padding:0px 30px;
        margin-top: 10px;
      }
      .g input{
        margin-right:5px;
        margin-top:13px;
        accent-color:black;
      }
      .i{
        margin-top:15px;
        margin-left:32px;
        font-size:13px;
      }
      .i input{
        margin-right:6px;
        accent-color:white;
      }
      .reg{
        text-align: center;
        padding:30px 36px;
        margin-top:-20px;
      }
      
      .btn{
        width:100%;
        font-weight: bold;
        font-size: 14.5px;
        padding: 6px 0px;
        background-color: rgb(255, 28, 28);
        color:white;
        border:none;
        border-radius:5px;
        cursor:pointer;
      }
      .btn:hover{
        box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.5);
      }
      .login{
        font-size:13px;
        text-align:center;
        margin-top:-35px;
      }
      .login a{
        color:rgb(14, 25, 230);
        text-decoration:none;
        margin-left:5px;
      }
      .login a:hover{
        text-decoration:underline;
        color:rgb(17, 0, 255);
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <form action="database.php" method="post">
        <h3>Donor Registration</h3>
        <div class="ne">
          <div>
            <h5>Full Name</h5>
            <input type="text" name="fullname" placeholder="Enter your name">
          </div>
          <div>
            <h5>Email</h5>
            <input type="email" name="email"  placeholder="Enter your email">
          </div>
          </div>
          <div class="pc">
            <div>
              <h5>Password</h5>
            <input type="password" name="password" placeholder="Enter password">
            </div>
            <div>
              <h5>Confirm password</h5>
              <input type="password" name="confirmpassword" placeholder="confirm your password">
            </div>
          </div>
          <div class="lc">
            <div>
              <h5>Country</h5>
            <input type="text" name="country" placeholder="Enter your country">
            </div>
            <div>
              <h5>Address</h5>
              <input type="text" name="address" placeholder="Enter your Address">
            </div>
          </div>
          <div class="pb">
            <div>
              <h5>Phone number</h5>
            <input type="number" name="phonenumber" placeholder="Enter Phone number">
            </div>
            <div class="bd">
              <h5>Blood Group</h5>
              <select name="bloodgroup">
                <option value="A+">A positive (A+)</option>
                <option value="A-">A negative (A-)</option>
                <option value="B+">B positive (B+)</option>
                <option value="B-">B negative (B-)</option>
                <option value="O+">O positive (O+)</option>
                <option value="O-">O negative (O-)</option>
                <option value="AB+">AB positive (AB+)</option>
                <option value="AB-">AB negative (AB-)</option>
              </select>
            </div>
          </div>

          <div class="gen">
            <h5>Gender</h5>
          <div class="g">
          <label for="Male">
            <input type="radio" name="gender" value="M" id="male">Male
          </label>
        </div>
          <div class="g">
            <label for="Female">
              <input type="radio" name="gender" value="F" id="female">Female
            </label>
          </div>
          <div class="g">
            <label for="Other">
              <input type="radio" name="gender" value="O" id="others">Other
            </label>
          </div>
        </div>
        <div class="i">
          <label><input type="checkbox" name="agree" value="agree">I agree with terms and conditions</label> 
        </div>
        <div class="reg">
          <a href="student details.html" target="_blank">
        <button class="btn">Register</button>
        </a>
        </div>
        <div class="login">
          <p>Already have an account?<a href="login.html" target="_bllank">Login</a></p>
        </div>
      </div>
      </form>
    </div>
  </body>
</html>