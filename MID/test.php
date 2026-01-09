<!DOCTYPE html>
<html>
<head>
<title>PHP Form Validation Lab</title>
</head>
<body>
 
<h1> Welcome to Registration </h1>
 
<?php
// initialize variables
$name = $email = $gender = $bg = "";
$dd = $mm = $yy = "";
$skills = [];
 
$nameErr = $emailErr = $dobErr = $genderErr = $skillErr = $bgErr = "";
 
// form submit check
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    /* -------- Name Validation -------- */
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
 
    /* -------- Email Validation -------- */
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
 
    /* -------- Date of Birth Validation -------- */
    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yy = $_POST["yy"];
 
    if (empty($dd) || empty($mm) || empty($yy))
    {
        $dobErr = "DOB required";
    }
    else if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998)
    {
        $dobErr = "Invalid DOB";
    }
 
    /* -------- Gender Validation -------- */
    if (!isset($_POST["gender"]))
    {
        $genderErr = "Select gender";
    }
    else
    {
        $gender = $_POST["gender"];
    }
 
    /* -------- Skills Validation -------- */
    if (!isset($_POST["skill"]) || count($_POST["skill"]) < 2)
    {
        $skillErr = "Select at least two skills";
    }
    else
    {
        $skills = $_POST["skill"];
    }
 
    /* -------- Blood Group Validation -------- */
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
 
Date of Birth:
<input type="number" name="dd" placeholder="DD" value="<?php echo $dd; ?>">
<input type="number" name="mm" placeholder="MM" value="<?php echo $mm; ?>">
<input type="number" name="yy" placeholder="YYYY" value="<?php echo $yy; ?>">
<?php echo $dobErr; ?><br><br>
 
Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
<?php echo $genderErr; ?><br><br>
 
Skills:
<input type="checkbox" name="skill[]" value="PHP"> PHP
<input type="checkbox" name="skill[]" value="Java"> Java
<input type="checkbox" name="skill[]" value="C++"> C++
<input type="checkbox" name="skill[]" value="C#"> C#
<?php echo $skillErr; ?><br><br>
 
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
// show output if no error
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($nameErr) && empty($emailErr) && empty($dobErr) &&
    empty($genderErr) && empty($skillErr) && empty($bgErr))
{
    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "DOB: $dd-$mm-$yy <br>";
    echo "Gender: $gender <br>";
    echo "Skills: " . implode(", ", $skills) . "<br>";
    echo "Blood Group: $bg <br>";
}
?>
 
</body>
</html>