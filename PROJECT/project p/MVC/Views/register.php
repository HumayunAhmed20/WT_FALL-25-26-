<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
 
<style>
*{box-sizing:border-box;font-family:Arial,Helvetica,sans-serif}
body{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:#f4f6f9
}
.card{
width:100%;
max-width:420px;
background:#fff;
padding:30px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.2)
}
h3{
text-align:center;
color:#0d6efd;
margin-bottom:25px
}
label{font-weight:bold}
input{
width:100%;
padding:12px;
margin-bottom:15px;
border-radius:12px;
border:1px solid #ccc
}
button{
width:100%;
padding:12px;
background:#0d6efd;
color:#fff;
border:0;
border-radius:12px
}
</style>
</head>
 <body>
<div class="card">
<h3>Create Account</h3>
 
<form method="POST">
 
<label>Username</label>
<input type="text" name="username" placeholder="Enter username">

 
<label>Email</label>
<input type="email" name="email" placeholder="Enter email">
 
<label>Password</label>
<input type="password" name="password" placeholder="Enter password">
 
<label>Role</label>
<input type="text" name="role" value="user">
 
<button type="submit">Register</button>
</form>
 
<div class="login-text">
Already have an account? <a href="">Login</a>
</div>
</div>
</body>
</html>