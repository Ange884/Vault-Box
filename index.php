<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Detailed Students Form</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #030303;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    background-image:url(kd.jpg);

}
.fstyle{
background-color: #2596be;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 90%;
    max-width: 500px;
    align-items: center;
    margin:20px auto;
}

fieldset {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
}

legend {
    font-weight: bold;
    color: #030303;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="file"] {
    margin-top: 10px;
}

input[type="checkbox"] {
    margin-right: 10px;
}

label {
    margin-bottom: 10px;
}

select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
}

textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}
h1{
    text-align: center;
}
.display{
    justify-content: center;
    align-items: center;
    text-align: center;
    display: flex;
    font-size: 25px;
    background-color: #2596be;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 90%;
    max-width: 500px;
    align-items: center;
    margin:20px auto;
}


    </style>

</head>
<body>
    <h1>Student's Bio</h1>
    <div class="fstyle">
    <form action=""method="post" enctype="multipart/form-data">
        <fieldset>
            <p><i><b>Fill the following area</b></i></p>
            <label>First name</label>
            <input type="text" id="fname" name="fname" placeholder="Your first name" required><br>
            <label>Last name</label>
            <input type="text" id="lname" name="lname" placeholder="Your last name" required><br>
            <label>Email</label>
            <input type="email" id="email" name="email" placeholder="Your email" required><br>
            <label>Phone number</label>
            <input type="tel" name="phone" placeholder="078..." required>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Guardian's Info</legend>
            <label>Mother's name</label>
            <input type="text" placeholder="Mother's name" name="mamaname">
            <label>Mother's Email</label>
            <input type="email" placeholder="Mother's email" name="mamaemail">
            <label>Mother's phone number</label>
            <input type="tel" name="mnumber"><br>
            <label>Father's name</label>
            <input type="text" placeholder="Father's name" name="papaname">
            <label>Father's Email</label>
            <input type="email" placeholder="Father's email" name="papaemail">
            <label>Father's phone number</label>
            <input type="tel" name="pnumber">
        </fieldset>
        <fieldset>
            <legend>Interests</legend>
            <p><i><b>Choose among the following interests that apply to you:</b></i></p>
            <input type="checkbox" value="Music" name="hobbie[]"> <label>Music</label><br>
            <input type="checkbox" value="Theatre and Movies" name="hobbie[]"> <label>Theatre and Movies</label><br>
            <input type="checkbox" value="Sports" name="hobbie[]"> <label>Sports</label><br>
            <input type="checkbox" value="Traveling" name="hobbie[]"> <label>Traveling</label>
        </fieldset>
        <fieldset>
            <legend>Report Submission</legend>
            <p>Upload your report here:</p>
            <input type="file" id="file-upload" name="file" required>
        </fieldset>
        <label for="birthdate">Birthday</label><br>
        <input type="date" id="birthdate" name="birthdate" required><br>
        <p>Which country are you from?</p>
        <select name="country" id="options">
            <option value="Rwanda">Rwanda</option>
            <option value="Uganda">Uganda</option>
            <option value="Kenya">Kenya</option>
            <option value="Tanzania">Tanzania</option>
            <option value="DRC">DRC</option>
        </select>
        <textarea name="comment" rows="4" cols="50" placeholder="Your comments about the webpage!"></textarea><br>
        <button type="submit">Submit</button>
        </form>
    </div>
    <div class="display">
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = htmlspecialchars($_POST['fname'] ?? '');
    $lastname = htmlspecialchars($_POST['lname'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $mother_name = htmlspecialchars($_POST['mamaname'] ?? '');
    $mother_email = htmlspecialchars($_POST['mamaemail'] ?? '');
    $mother_phone = htmlspecialchars($_POST['mnumber'] ?? '');
    $father_name = htmlspecialchars($_POST['papaname'] ?? '');
    $father_email = htmlspecialchars($_POST['papaemail'] ?? '');
    $father_phone = htmlspecialchars($_POST['pnumber'] ?? '');
    $interests = isset($_POST['hobbie']) ? htmlspecialchars(implode(', ', $_POST['hobbie'])) : 'None';
    $comment = htmlspecialchars($_POST['comment'] ?? '');
    $birthdate = htmlspecialchars($_POST['birthdate'] ?? '');
    $country = htmlspecialchars($_POST['country'] ?? 'Unknown');

    // File handling
    $file = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file']['name'];
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file);
    }

    echo "<table border='1'>
        <tr>
            <th>First Name</th><td>$firstname</td>
        </tr>
        <tr>
            <th>Last Name</th><td>$lastname</td>
        </tr>
        <tr>
            <th>Email</th><td>$email</td>
        </tr>
        <tr>
            <th>Phone</th><td>$phone</td>
        </tr>
        <tr>
            <th>Mother's Name</th><td>$mother_name</td>
        </tr>
        <tr>
            <th>Mother's Email</th><td>$mother_email</td>
        </tr>
        <tr>
            <th>Mother's Phone</th><td>$mother_phone</td>
        </tr>
        <tr>
            <th>Father's Name</th><td>$father_name</td>
        </tr>
        <tr>
            <th>Father's Email</th><td>$father_email</td>
        </tr>
        <tr>
            <th>Father's Phone</th><td>$father_phone</td>
        </tr>
        <tr>
            <th>Interests</th><td>$interests</td>
        </tr>
        <tr>
            <th>Uploaded File</th><td>$file</td>
        </tr>
        <tr>
            <th>Comment</th><td>$comment</td>
        </tr>
        <tr>
            <th>Date of Birth</th><td>$birthdate</td>
        </tr>
        <tr>
            <th>Country</th><td>$country</td>
        </tr>
    </table>";
}
?>
    </div>
</body>
</html>
