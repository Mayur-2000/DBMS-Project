<?php
	$title = "Administration section";
	//require_once "./template/header.php";
?>
<html>
<head>
	<style>
body{
    background:#f4f3ff;
    background-image: url(splash.png);
    background-repeat: no-repeat;
   background-position: center;
   background-size:cover;
   position: relative;
   overflow:hidden;
}

h1{
    text-align:center;
    font-size:40px;
    padding-top:20px;
    color:red;
}
h1::after{
    content:'';
    background:red;
    display:block;
    height:3px;
    width:450px;
    margin:20px auto 50px;
}
h3{
    text-align:center;
    font-size:30px;
    padding-top:20px;
    color:red;
}
 h3::after{
    content:'';
    background:red;
    display:block;
    height:3px;
    width:450px;
    margin:20px auto 50px;
}

.form-group{
    text-align:center;
    padding:8px;
    color:red;
    font-size: 20px;
    font-weight: bold;
}
.form-control{
    text-align:center;
    padding:10px;
    border:1px solid black;
}

.bubbles img{
    width:50px;
    animation:bubble 7s linear infinite;
}
.bubbles{
    width:100%;
    display:flex;
    align-items: center;
    justify-content:space-around;
    position:absolute;
    bottom:-70px;
}
@keyframes bubble{
    0%{
        transform:translateY(0);
        opacity:0;
    }
    50%{
         opacity:1;
    }
    70%{
         opacity:1;
    }
    100%{
        transform:translateY(-80vh);
        opacity:0;
    }
}

.bubbles img:nth-child(1){
    animation-delay:0s;
    width:60px;
}
.bubbles img:nth-child(2){
    animation-delay:1s;
}
.bubbles img:nth-child(3){
    animation-delay:3s;
    width:25px;
}
.bubbles img:nth-child(4){
    animation-delay:4.5s;
    width:45px;
}
.bubbles img:nth-child(5){
    animation-delay:3s;
    width: 75px;
}
.bubbles img:nth-child(6){
    animation-delay:6s;
    width:25px;
}
.bubbles img:nth-child(7){
    animation-delay:7s;
    width:35px;
}
.bubbles img:nth-child(8){
    animation-delay:4s;
    width:45px;
}
.bubbles img:nth-child(9){
    animation-delay:6s;
    width:35px;
}

</style>
		

</head>

<body>
<h1>PLASMA BANK MANAGEMENT SYSTEM</h1>
<h3>Login To Admin's Table</h3>
	<form class="form-horizontal" method="post" action="admin_verify.php">
		<div class="form-group">
			<label for="name"  class="control-label col-md-4">USERNAME</label>
			<div class="col-md-4">
				<input type="text" row="2" placeholder="Username" name="name" class="form-control">
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="pass"  class="control-label col-md-4">PASSWORD</label>
			<div class="col-md-4">
				<input type="password"  placeholder="Password" name="pass" class="form-control">
			</div>
		</div>
		<br>
<center>
		<input type="submit" name="submit" class="btn btn-primary">
</center>
	</form>
	                <div class="bubbles">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                    <img src="bubble.png">
                </div>

</body>
</html>
<?php
	require_once "./template/footer.php";
?>