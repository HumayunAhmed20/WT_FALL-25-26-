<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>

<style>
*{
    box-sizing:border-box;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    margin:0;
    background:#f4f6f9;
}


.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:220px;
    height:100vh;
    background:#0d6efd;
    padding:20px;
    color:#fff;
}
.sidebar h3{
    text-align:center;
    margin-bottom:30px;
    color:#ffd369;
}
.sidebar a{
    display:block;
    padding:12px;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    margin-bottom:10px;
}
.sidebar a:hover{
    background:#084298;
}


.topbar{
    margin-left:220px;
    background:#fff;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
}

.main{
    margin-left:220px;
    padding:25px;
}


.card{
    background:#fff;
    border-radius:12px;
    padding:20px;
    margin-bottom:20px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
}
.card h4{
    margin-top:0;
}


button{
    padding:10px;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
.btn-primary{
    background:#0d6efd;
    color:#fff;
    width:100%;
}
.btn-success{
    background:#198754;
    color:#fff;
    width:100%;
    margin-top:10px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
th,td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:left;
}
th{
    background:#0d6efd;
    color:#fff;
}

    input{
    width:100%;
    padding:8px;
    margin-top:5px;
    margin-bottom:10px;
}

.alert{
    background:#d1e7dd;
    color:#0f5132;
    padding:10px;
    border-radius:8px;
    margin-bottom:20px;
}
</style>
</head>

<body>

<div class="sidebar">
    <h3>User</h3>
    <a href="#">Dashboard</a>
    <a href="#">Upcoming Events</a>
    <a href="#">My Registrations</a>
    <a href="#">Logout</a>
</div>


<div class="topbar">
    <h2>Student Dashboard</h2>
    <p>Welcome, Student</p>
</div>


<div class="main">

    
    <div class="alert">Welcome to the Sports Event Dashboard</div>

 
    <div class="card">
        <h4>Football Tournament</h4>
        <p>Date: 07 Feb 2026</p>
        <p>Venue: AIUB Ground</p>
        <button class="btn-primary">Register Solo</button>
        <button class="btn-success">Register as Team</button>
    </div>

 
    <div class="card">
        <h4>My Participation History</h4>
        <table>
            <tr>
                <th>#</th>
                <th>Event</th>
                <th>Team / Players</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Football Tournament</td>
                <td>Individual</td>
                <td>10 Feb 2026</td>
                <td>Pending</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Cricket League</td>
                <td>
                    Team Tigers<br>
                    Rahim (22-1234)<br>
                    Karim (22-1235)
                </td>
                <td>05 Feb 2026</td>
                <td>Approved</td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>
