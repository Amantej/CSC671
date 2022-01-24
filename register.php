<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/logreg.css">
</head>

<body>
<?php require_once("process/header.php"); ?>
<div class="logreg">
    <div class="form">
        <form action="./process/register_process.php" method="post">
            <input type="name" name="fname" placeholder="First Name" required/>
            <input type="name" name="lname" placeholder="Last Name"  required/>
            <input type="text" name="username" placeholder="Username" required/>
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password" placeholder="Password" required/>
            <input type="text" name="phone" placeholder="Phone" name="idNumber" pattern ="[0-9]{10}" required/>
            <input type="text" name="street" placeholder="Street Address" required/>
            <input type="name" name="city" placeholder="City" required/>
            <input type="name" name="country" placeholder="Country" required/>
            <button>create</button>
            <p class="message">Already registered? &ensp;<a href="./login.php"><strong>Sign In</strong></a></p>
        </form>
    </div>
</div>
<?php require_once("process/footer.php"); ?>
</body>

</html>