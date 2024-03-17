
<?php
require "Connection.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($_POST["submit"])) {
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Gender = $_POST['gender'][0];
        $department = $_POST['department'];

        $address_line_1 = $_POST['address_line_1'];
        $address_line_2 = $_POST['address_line_2'];
        $city = $_POST['city'];
        $State = $_POST['State'];
        $Country = $_POST['Country'];
        $zip_code = $_POST['zip_code'];
        $Contact_no = $_POST['Contact_no'];

        $profilePic = $_FILES["profilePic"]["name"];
        $tempfile = $_FILES["profilePic"]["tmp_name"];

        $resume = $_FILES['resume']['name'];
        $tempfile1 = $_FILES["resume"]["tmp_name"];

        $folder = "images/" . $profilePic;
        $folder1 = "documents/" . $resume;
        $sql1 = "UPDATE registration SET firstname = ?, lastname = ?, email = ?, password = ?, gender = ?, department = ?, address_line1 = ?, address_line2 = ?, city = ?, state = ?, country = ?, zip_code = ? , contact_number = ?, profile_pic = ?, resume = ? WHERE user_id = $id";
        $stmt = $conn->prepare($sql1);

        // Bind parameters
        $stmt->bind_param("sssssssssssssss", $first_name, $last_name, $email, $password, $Gender, $department, $address_line_1, $address_line_2, $city, $State, $Country, $zip_code, $Contact_no, $profilePic, $resume);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: index.php?message=Record Updated Successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    }
    ?>
    <!-- Student Form Validation with Database (13/3/24)-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Student Registration Form </title>
        <link rel="stylesheet" href="./css/styles.css">
        <style>
            .error {
                color: red;
            }
        </style>

    </head>

    <body>
        <form id="student" method="post" action="" enctype="multipart/form-data">

            <h1> Student Registration Form </h1>
            <?php
            require "Connection.php";
            $id = $_GET["id"];
            // $sql = "SELECT * FROM `registration` WHERE user_id = $id LIMIT 1";
            // $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_assoc($result);
            $sql = "SELECT user_id, firstname, lastname, email, password, gender, department, address_line1, address_line2, city, state, country, zip_code, contact_number, profile_pic, resume FROM registration where user_id = $id Limit 1";
            // Prepare the statement
            if ($stmt = $conn->prepare($sql)) {
                // Execute the statement
                $stmt->execute();

                // Bind result variables
                $stmt->bind_result($user_id, $firstname, $lastname, $email, $password, $gender, $department, $address_line1, $address_line2, $city, $state, $country, $zip_code, $contact_number, $profile_pic, $resume);
                $stmt->fetch();

            }
            ?>
            <!-- First Name -->
            <label for="fname">First Name :</label>
            <input type="text" id="fname" name="fname" value="<?php echo $firstname ?>" required><br>

            <!-- Last Name -->
            <label for="lname">Last Name :</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lastname ?>" required><br>

            <!-- Email -->
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email ?>" required><br>

            <!-- Password -->
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" placeholder="password" value="<?php echo $password ?>"
                required><br>

            <!-- gender -->
            <label>Gender :</label>
            <label for="maleGender">Male <input type="radio" name="gender[]" id="maleGender" <?php if ($gender == "Male") {
                echo "checked";
            } ?> value="male"></label>
            <label for="femaleGender">Female <input type="radio" name="gender[]" value="Female" id="femaleGender" <?php if ($gender == "Female") {
                echo "checked";
            } ?> value="female"> </label>
            <label for="gender[]" class="error" style="display: none;"></label>
            <br>

            <!-- Department -->
            <label for="department">Department :</label>
            <select name="department" id="department" required>
                <option value="dept" disabled selected> Please choose an Your Department </option>
                <option value="M.Tech" <?php if ($department == 'M.Tech')
                    echo 'selected'; ?>>M.Tech</option>
                <option value="B.Tech" <?php if ($department == 'B.Tech')
                    echo 'selected'; ?>>B.Tech</option>
                <option value="MBA" <?php if ($department == 'MBA')
                    echo 'selected'; ?>>MBA</option>
                <option value="BBA" <?php if ($department == 'BBA')
                    echo 'selected'; ?>>BBA</option>
            </select>

            <!-- Address -->
            <label for="address">Address :</label>
            <input type="text" id="address_1" name="address_line_1" placeholder="Address Line 1"
                value="<?php echo $address_line1 ?>" required>
            <input type="text" id="address_2" name="address_line_2" placeholder="Address Line 2"
                value="<?php echo $address_line2 ?>"><br>
            <input type="text" id="city" name="city" placeholder="City" value="<?php echo $city ?>" required>
            <input type="text" id="state" name="State" placeholder="State" value="<?php echo $state ?>" required><br>
            <input type="text" id="country" name="Country" placeholder="Country" value="<?php echo $country ?>" required>
            <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code" value="<?php echo $zip_code ?>"
                required>


            <!-- Contact Number -->
            <label for="Contact_no"> Contact Number</label>
            <input type="tel" name="Contact_no" id="Contact_no" placeholder="Contact Number"
                value="<?php echo $contact_number ?>" required>


            <!-- Profile Pic -->
            <label for="profilePic"> Profile Picture : </label>
            <input type="file" id="profilePic" name="profilePic" accept=".jpg, .jpeg, .png |image/*" required>
            <div class="error" id="profilePicError"></div>

            <!-- Resume -->
            <label for="resume"> Resume : </label>
            <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" required>
            <div class="error" id="resumeError"></div>
            <button type="submit" id="submitButton" name="submit">Submit</button><br>

        </form>
        

        <script src="./jquery/jquery-3.7.1.js"></script>
        <script src="./jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
        <script src="./jquery-validation-1.19.5/dist/additional-methods.js"></script>
        <script src="./js/scripts.js"></script>
    </body>

    </html>
    <?php
} else {
    if (isset($_POST['submit'])) {
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Gender = $_POST['gender'][0];
        $department = $_POST['department'];

        $address_line_1 = $_POST['address_line_1'];
        $address_line_2 = $_POST['address_line_2'];
        $city = $_POST['city'];
        $State = $_POST['State'];
        $Country = $_POST['Country'];
        $zip_code = $_POST['zip_code'];
        $Contact_no = $_POST['Contact_no'];

        // $profilePic = file_get_contents($_FILES['profilePic']['tmp_name']);
        $profilePic = $_FILES["profilePic"]["name"];
        $tempfile = $_FILES["profilePic"]["tmp_name"];

        $resume = $_FILES['resume']['name'];
        $tempfile1 = $_FILES["resume"]["tmp_name"];

        $folder = "images/" . $profilePic;
        $folder1 = "documents/" . $resume;
        $sql = "INSERT INTO registration (firstname, lastname, email, password, gender, department, address_line1, address_line2, city, state, country, zip_code, contact_number, profile_pic, resume)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        move_uploaded_file($tempfile, $folder);
        move_uploaded_file($tempfile1, $folder1);

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", $first_name, $last_name, $email, $password, $Gender, $department, $address_line_1, $address_line_2, $city, $State, $Country, $zip_code, $Contact_no, $profilePic, $resume);

        if ($stmt->execute()) {
            header("Location: index.php?message=Record Inserted Successfully");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } ?>
    <!-- Student Form Validation with Database (13/3/24)-->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Student Form Validation </title>
        <link rel="stylesheet" href="./css/styles.css">
        <style>
            .error {
                color: red;
            }
        </style>

    </head>

    <body>
        <form id="student" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

            <h1> Student Registration Form </h1>

            <!-- First Name -->
            <label for="fname">First Name :</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required><br>

            <!-- Last Name -->
            <label for="lname">Last Name :</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required><br>

            <!-- Email -->
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Email" required><br>

            <!-- Password -->
            <label for="password">Password : </label>
            <input type="password" id="password" name="password" placeholder="password" required><br>

            <!-- gender -->
            <label>Gender :</label>
            <label for="maleGender">Male <input type="radio" name="gender[]" value="male" id="maleGender"></label>
            <label for="femaleGender">Female <input type="radio" name="gender[]" value="female" id="femaleGender"> </label>
            <label for="gender[]" class="error" style="display: none;"></label>
            <br>

            <!-- Department -->
            <label for="department">Department :</label>
            <select name="department" id="department" required>
                <option value="dept"> Please choose an Your Department </option>
                <option value="M.Tech">M.Tech</option>
                <option value="B.Tech">B.Tech</option>
                <option value="MBA">MBA</option>
                <option value="BBA">BBA</option>
            </select>

            <!-- Address -->
            <label for="address">Address :</label>
            <input type="text" id="address_1" name="address_line_1" placeholder="Address Line 1" required>
            <input type="text" id="address_2" name="address_line_2" placeholder="Address Line 2"><br>
            <input type="text" id="city" name="city" placeholder="City" required>
            <input type="text" id="state" name="State" placeholder="State" required><br>
            <input type="text" id="country" name="Country" placeholder="Country" required>
            <input type="text" id="zip_code" name="zip_code" placeholder="Zip Code" required>


            <!-- Contact Number -->
            <label for="Contact_no"> Contact Number</label>
            <input type="tel" name="Contact_no" id="Contact_no" placeholder="Contact Number" required>


            <!-- Profile Pic -->
            <label for="profilePic"> Profile Picture : </label>
            <input type="file" id="profilePic" name="profilePic" accept=".jpg, .jpeg, .png |image/*" required>
            <div class="error" id="profilePicError"></div>

            <!-- Resume -->
            <label for="resume"> Resume : </label>
            <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" required>
            <div class="error" id="resumeError"></div>
            <button type="submit" id="submitButton" name="submit">Submit</button><br>



            <input type="hidden" value="">
        </form>


        <script src="./jquery/jquery-3.7.1.js"></script>
        <script src="./jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
        <script src="./jquery-validation-1.19.5/dist/additional-methods.js"></script>
        <script src="./js/scripts.js"></script>
    </body>

    </html>
    <?php
}
?>