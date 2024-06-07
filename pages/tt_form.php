<?php
session_start();

if (isset($_POST["submit"])) {
    //registerComplaint();
    fillAdd();
}

function registerComplaint() {
    $nom = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $badperson = htmlentities($_POST['badperson']);
    $date = htmlentities($_POST['date']);
    $location = htmlentities($_POST['location']);
    $description = htmlentities($_POST['description']);
    $witnesses = htmlentities($_POST['witnesses']);
    $action = htmlentities($_POST['action']);
    $type = htmlentities($_POST['type']);

    // Database connection details
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $name, $passwd, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die('Connection error (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
    } else {
        // Prepare and bind
        $stmt = $mysqli->prepare("INSERT INTO complaint (nom, harceleur, email, typee, phone, datee , descriptionn, witnesses, locationn, actionn) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $nom, $badperson, $email, $type, $phone, $date, $description, $witnesses, $location, $action);

        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "Enregistrement réussi.";
        } else {
            $_SESSION['message'] = "Impossible d'enregistrer.";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();

    // Redirect to the previous page
    //header("Location: " . $_SERVER['HTTP_REFERER']);
    //exit;
}

function fillAdd() {
    $target_dir = "images/"; // Répertoire de destination 
    $target_file = $target_dir . basename($_FILES["fillle"]["name"]); // Chemin complet du fichier à télécharger
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        echo "1";
    // Vérifier si le fichier est réel ou non
    if (isset($_FILES["fillle"]["tmp_name"])) {
        $check = getimagesize($_FILES["fillle"]["tmp_name"]);
        if ($check !== false || $imageFileType == "pdf") {
            $uploadOk = 1;
        } else {
            $_SESSION['message'] = "Le fichier n'est pas une image ou un PDF.";
            $uploadOk = 0;
        }
    } else {
        $_SESSION['message'] = "Aucun fichier téléchargé.";
        $uploadOk = 0;
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
        $_SESSION['message'] = "Le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifier la taille maximale du fichier
    if ($_FILES["fillle"]["size"] > 1000000) {
        $_SESSION['message'] = "Le fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichiers
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
    if (!in_array($imageFileType, $allowed_types)) {
        $_SESSION['message'] = "Seuls les fichiers JPG, JPEG, PNG, GIF et PDF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        $_SESSION['message'] = $_SESSION['message'] ?? "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        // Si tout est correct, télécharger le fichier
        if (move_uploaded_file($_FILES["fillle"]["tmp_name"], $target_file)) {
            $_SESSION['message'] = "Le fichier " . htmlspecialchars(basename($_FILES["fillle"]["name"])) . " a été téléchargé.";
        } else {
            $_SESSION['message'] = "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
        }
    }

    // Rediriger vers la page précédente avec un message
    //header("Location: " . $_SERVER['HTTP_REFERER']);
   // exit; // Arrêter l'exécution du script actuel
}
?>
