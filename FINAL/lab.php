<!DOCTYPE html>
<html>
<head>
<title>PHP Form Validation Lab</title>
</head>
<body>
 
<h1> Registration </h1>
 
<?php
 
$name = $email = $gender = $bg = "";
$degrees = [];
 
$nameErr = $emailErr = $genderErr = $degreeErr = $bgErr = "";
 
 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = trim($_POST["name"]);
        if (!preg_match("/^[A-Za-z][A-Za-z .-]*$/", $name))
        {
            $nameErr = "Invalid name format";
        }
        else if (str_word_count($name) < 2)
        {
            $nameErr = "At least two words required";
        }
    }
 
    if (empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    }
    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        $emailErr = "Invalid email";
    }
    else
    {
        $email = $_POST["email"];
    }
 
    if (!isset($_POST["gender"]))
    {
        $genderErr = "Select gender";
    }
    else
    {
        $gender = $_POST["gender"];
    }
 
 
    if (!isset($_POST["degree"]) || count($_POST["degree"]) < 2)
    {
        $degreeErr = "Select at least two skills";
    }
    else
    {
        $degrees = $_POST["degree"];
    }
 
  
    if (empty($_POST["bg"]))
    {
        $bgErr = "Select blood group";
    }
    else
    {
        $bg = $_POST["bg"];
    }
}
?>
 
<form method="post">
 
Name:
<input type="text" name="name" value="<?php echo $name; ?>">
<?php echo $nameErr; ?><br><br>
 
Email:
<input type="text" name="email" value="<?php echo $email; ?>">
<?php echo $emailErr; ?><br><br>
 
Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
<?php echo $genderErr; ?><br><br>
 
Degrees:
<input type="checkbox" name="degree[]" value="SSC"> SSC
<input type="checkbox" name="degree[]" value="HSC"> HSC
<input type="checkbox" name="degree[]" value="BSC"> BSC
<?php echo $degreeErr; ?><br><br>
 
Blood Group:
<select name="bg">
<option value="">Select</option>
<option>A+</option>
<option>B+</option>
<option>O+</option>
<option>AB+</option>
</select>
<?php echo $bgErr; ?><br><br>
 
<input type="submit" value="Submit">
 
</form>
 
<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($nameErr) && empty($emailErr) &&
    empty($genderErr) && empty($degreeErr) && empty($bgErr))
{
    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Gender: $gender <br>";
    echo "Degrees: " . implode(", ", $degrees) . "<br>";
    echo "Blood Group: $bg <br>";
}
?>
 
</body>
</html>