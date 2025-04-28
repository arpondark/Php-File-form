<?php

$upload_dir = 'uploads/';
$contactFile = 'contacts.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $image = isset($_FILES['image']) ? $_FILES['image'] : null;

   
   // var_dump($name, $email, $phone, $image);

    // Validate the inputs
    if (!empty($name) && !empty($email) && !empty($phone) && $image && $image['error'] === UPLOAD_ERR_OK) {
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $imageName = time() . '_' . basename($image['name']);
        $target_file = $upload_dir . $imageName;

        if (move_uploaded_file($image['tmp_name'], $target_file)) {
            $contacts = file_exists($contactFile) ? json_decode(file_get_contents($contactFile), true) : [];
            $contacts[] = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'image' => $target_file
            ];
            file_put_contents($contactFile, json_encode($contacts, JSON_PRETTY_PRINT));
            echo 'Contact added successfully!';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please fill in all fields and upload a valid image.";
    }
}

?>