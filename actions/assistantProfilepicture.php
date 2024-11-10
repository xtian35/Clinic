<?php require_once('../config/config.php');

if (isset($_POST['profile'])) {
   $file_extension = pathinfo($_FILES['assistantProfilepicture']['name'], PATHINFO_EXTENSION);
   $random_name = md5(uniqid());
   $picture_name = $random_name . '.' . $file_extension;
   $assistant_ID = $_SESSION['Assistant_ID'];

   $update = update('assistant', ['Assistant_ID' => $assistant_ID], ['assistantProfilepicture' => '../public/Profilepictures/' . $picture_name]);
   if ($update) {
       $move = move_uploaded_file($_FILES['assistantProfilepicture']['tmp_name'], '../public/Profilepictures/' . $picture_name);
       if ($move) {
           setSession(['assistantProfilepicture'=>'../public/Profilepictures/' . $picture_name]);
           setFlash('success', 'Profile Picture Uploaded');
           redirect('assistantUpdateprofile');
       }
   }
}  