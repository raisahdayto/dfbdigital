<?php
require("../connect/config.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine which form is being submitted
    $formType = $_POST['formType'] ?? '';

    // Process Audit Modal form submission
    if ($formType === 'audit') {
        $firstName = $_POST['firstName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $companyName = $_POST['companyName'] ?? '';
        $emailAddress = $_POST['emailAddress'] ?? '';
        $mobileNumber = $_POST['mobileNumber'] ?? '';

        // Validate required fields
        if (empty($firstName) || empty($lastName) || empty($companyName) || empty($emailAddress)) {
            echo json_encode(["status" => "error", "message" => "All required fields must be filled."]);
            exit;
        }

        // Insert data into the Audit table
        $stmt = $conn->prepare("INSERT INTO audit (firstName, lastName, companyName, emailAddress, mobileNumber) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $companyName, $emailAddress, $mobileNumber);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Congratulations! Your free digital audit is coming soon."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error submitting your request: " . $stmt->error]);
        }
        $stmt->close();
    }

    // Process Contact Modal form submission
    elseif ($formType === 'contact') {
        $fullName = $_POST['fullName'] ?? '';
        $emailAddress = $_POST['c-emailAddress'] ?? '';
        $message = $_POST['message'] ?? '';

        // Validate required fields
        if (empty($fullName) || empty($emailAddress) || empty($message)) {
            echo json_encode(["status" => "error", "message" => "All required fields must be filled."]);
            exit;
        }

        // Insert data into the Contact table
        $stmt = $conn->prepare("INSERT INTO contact (fullName, emailAddress, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullName, $emailAddress, $message);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Your message has been sent. We'll get back to you, soon."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error sending your message: " . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid form type."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close(); // Close the database connection
