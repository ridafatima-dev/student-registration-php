<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6fb;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 30px;
            background-color: #004b8d;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .form-container {
            width: 60%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form label {
            display: inline-block;
            width: 130px;
            margin-bottom: 8px;
        }

        form input,
        form select {
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #004b8d;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0066c0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #e0e7ff;
        }

        .dept-list {
            width: 60%;
            margin: 10px auto 30px auto;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #message {
            margin-top: 10px;
            font-weight: bold;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

    <h1>Student Registration System</h1>

    <nav>
        <a href="#">Home</a>
        <a href="#">Register</a>
        <a href="#">Contact</a>
    </nav>

    <div class="form-container">
        <h2>Register New Student</h2>

        <!-- IMPORTANT: action insert.php aur method POST -->
        <form id="regForm" action="insert.php" method="post" onsubmit="return validateForm();">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name"><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone"><br>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label><br>

            <label for="dept">Department:</label>
            <select id="dept" name="department">
                <option value="">--Select--</option>
                <option value="cs">Computer Science</option>
                <option value="it">Information Technology</option>
                <option value="se">Software Engineering</option>
            </select><br>

            <button type="submit">Submit</button>

            <div id="message"></div>
        </form>
    </div>

    <h2>Sample Student Records</h2>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Department</th>
        </tr>
        <tr>
            <td>Ali Khan</td>
            <td>ali@example.com</td>
            <td>0300-1111111</td>
            <td>Male</td>
            <td>Computer Science</td>
        </tr>
        <tr>
            <td>Sara Ahmed</td>
            <td>sara@example.com</td>
            <td>0300-2222222</td>
            <td>Female</td>
            <td>Information Technology</td>
        </tr>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>0300-3333333</td>
            <td>Male</td>
            <td>Software Engineering</td>
        </tr>
    </table>

    <div class="dept-list">
        <h2>Available Departments</h2>
        <ul>
            <li>Computer Science</li>
            <li>Information Technology</li>
            <li>Software Engineering</li>
            <li>Data Science</li>
        </ul>
    </div>

    <script>
        function validateForm() {
            var name    = document.getElementById("name").value.trim();
            var email   = document.getElementById("email").value.trim();
            var phone   = document.getElementById("phone").value.trim();
            var dept    = document.getElementById("dept").value;
            var genders = document.getElementsByName("gender");
            var msgDiv  = document.getElementById("message");

            msgDiv.className = "";
            msgDiv.innerHTML = "";

            if (name === "") {
                msgDiv.className = "error";
                msgDiv.innerHTML = "Error: Student name should not be empty.";
                return false;
            }

            if (email.indexOf("@") === -1) {
                msgDiv.className = "error";
                msgDiv.innerHTML = "Error: Email should contain '@'.";
                return false;
            }

            if (phone === "") {
                msgDiv.className = "error";
                msgDiv.innerHTML = "Error: Phone number should not be empty.";
                return false;
            }

            var genderSelected = false;
            for (var i = 0; i < genders.length; i++) {
                if (genders[i].checked) {
                    genderSelected = true;
                    break;
                }
            }
            if (!genderSelected) {
                msgDiv.className = "error";
                msgDiv.innerHTML = "Error: Please select gender.";
                return false;
            }

            if (dept === "") {
                msgDiv.className = "error";
                msgDiv.innerHTML = "Error: Please select department.";
                return false;
            }

            msgDiv.className = "success";
            msgDiv.innerHTML = "Form submitted successfully!";
            return true;   /* ab TRUE rakho taake PHP ko data jaye */
        }
    </script>

</body>
</html>