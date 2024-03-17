<?php
require "Connection.php";

if (isset ($_GET["id"])) {

	$id = $_GET["id"];
	$sql = "DELETE FROM registration WHERE user_id = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt) {
		$stmt->bind_param("i", $id);
		if ($stmt->execute()) {

			echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("delete_data").innerHTML = "Record Deleted Successfully";
                });
            </script>';
		} else {
			echo "Error: " . $conn->error;
		}
		$stmt->close();
	} else {
		echo "Error: " . $conn->error;
	}
}

// Close the connection
$conn->close();
?>


<!-- Display Students -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Students Details</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="./css/Custom.css">
</head>

<body>

	<div class="container1 m-5">
		<div class="row">
			<div class="col">
				<h2>Students Details</h2>
			</div>
		</div>
		<div class="d-flex justify-content-between mb-3">
			<div></div>
			<div>
				<a href="./student_registration.php" class="btn btn-success btn-add-new">Add New</a>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col">Gender</th>
						<th scope="col">Department</th>
						<th scope="col">Address Line 1</th>
						<th scope="col">Address Line 2</th>
						<th scope="col">City</th>
						<th scope="col">State</th>
						<th scope="col">Country</th>
						<th scope="col">Zip Code</th>
						<th scope="col">Contact Number</th>
						<th scope="col">Profile Pic</th>
						<th scope="col">Resume</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>

					<!-- Retrive Student Data -->

					<?php
					require "Connection.php";

					// Prepare the SQL query
					$sql = "SELECT user_id, firstname, lastname, email, gender, department, address_line1, address_line2, city, state, country, zip_code, contact_number, profile_pic, resume FROM registration";

					// Prepare the statement
					if ($stmt = $conn->prepare($sql)) {
						// Execute the statement
						$stmt->execute();

						// Bind result variables
						$stmt->bind_result($user_id, $firstname, $lastname, $email, $gender, $department, $address_line1, $address_line2, $city, $state, $country, $zip_code, $contact_number, $profile_pic, $resume);

						// Fetch records
						while ($stmt->fetch()) {
							// Output or process fetched data as needed
							echo "<tr>";
							echo "<td>$user_id</td>";
							echo "<td>$firstname</td>";
							echo "<td>$lastname</td>";
							echo "<td>$email</td>";
							echo "<td>$gender</td>";
							echo "<td>$department</td>";
							echo "<td>$address_line1</td>";
							echo "<td>$address_line2</td>";
							echo "<td>$city</td>";
							echo "<td>$state</td>";
							echo "<td>$country</td>";
							echo "<td>$zip_code</td>";
							echo "<td>$contact_number</td>";
							echo "<td> <img src=\"./images/$profile_pic\" width=\"100px\" alt=\"\"></td>";
							echo "<td> <a href=\"./documents/$resume\" alt=\" Resume of the Student\"class=\"download-link\">Download the Resume </a></td>";
							echo "<td> <a href=\"./student_registration.php?id=" . $user_id . "\" class=\"btn btn-primary m-1\"> Update </a> <a href=\"./index.php?id=" . $user_id . "\" class=\"btn btn-danger m-1\" onclick=\"return confirm('Are you sure you want to delete this student record?')\"> Delete </a> </td>";
							echo "</tr>";
						}

						// Close the statement
						$stmt->close();
					}

					// Close the connection
					$conn->close();
					?>
				</tbody>
			</table>
		</div>
		<br>
		<form action="">
			<input type="hidden">
			<?php
			$message = isset ($_GET['message']) ? $_GET['message'] : "";
			if (!empty ($message)) {
				echo "<h2>$message</h2>";
			}
			?>
			<h2 id="delete_data"></h2>
		</form>

	</div>


	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
	<script>
		if (window.location.href.indexOf('?id=') > -1) {
			// If the URL contains the id parameter, remove it
			var newUrl = window.location.href.split('?')[0];
			window.history.pushState({}, document.title, newUrl);
		}
	</script>
</body>

</html>