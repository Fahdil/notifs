<?php
session_start();

ob_start(); // Démarre la mise en mémoire tampon de sortie

if (isset($_POST["submit"])) {
    registerComplaint();
    fillAdd();
    sendMail();
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
    $nom_fichier=$_FILES["fillle"]["name"];
    // Database connection details
    require_once("param.inc.php");
    $mysqli = new mysqli($host, $name, $passwd, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die('Connection error (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
    } else {
        // Prepare and bind
        $stmt = $mysqli->prepare("INSERT INTO complaint (nom, harceleur, email, typee, phone, datee , descriptionn, witnesses, locationn, actionn,nom_fichier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssssssssss", $nom, $badperson, $email, $type, $phone, $date, $description, $witnesses, $location, $action, $nom_fichier);

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

        // Vérifier si le répertoire existe et le créer si nécessaire
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

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

    //Rediriger vers la page précédente avec un message
  //  header("Location: " . $_SERVER['HTTP_REFERER']);
   //exit; // Arrêter l'exécution du script actuel
}
?>

<?php
//fonction utilisant phpmailler pour envois de mail au responsable en charge de santé psychologique
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail() {
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

    $subject ="Abus/ harcelement "."$type";
    $message4 = $nom;
    $message2 = $phone;
    $message3 = $email;

    // Format HTML du message
    $message = "
        <html>
        <head>
            <title>Nouvelle plainte reçue</title>
        </head>
        <body>
            <h2>Nouvelle plainte reçue</h2>
            <p><strong>Nom du plaignant :</strong> $nom</p>
            <p><strong>Email du plaignant:</strong> $email</p>
            <p><strong>Téléphone du plaignant:</strong> $phone</p>
            <p><strong>Harceleur :</strong> $badperson</p>
            <p><strong>Date de l'abus:</strong> $date</p>
            <p><strong>Lieude l'abus :</strong> $location</p>
            <p><strong>Description de l'abus:</strong></p>
            <p>$description</p>
            <p><strong>Témoins :</strong> $witnesses</p>
            <p><strong>Actions :</strong> $action</p>
        </body>
        </html>
    ";

    require 'C:/wamp64/www/notifs/PHPMailer/src/Exception.php';
    require 'C:/wamp64/www/notifs/PHPMailer/src/PHPMailer.php';
    require 'C:/wamp64/www/notifs/PHPMailer/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';               // Adresse IP ou DNS du serveur SMTP
        $mail->Port = 465;                            // Port TCP du serveur SMTP
        $mail->SMTPAuth = true;                        // Utilisation de l'identification
        $mail->SMTPSecure = 'ssl';                    // Protocole de sécurisation des échanges avec le SMTP
        $mail->Username = 'mmarc71779@gmail.com';     // Adresse email à utiliser
        $mail->Password = 'umkonptumqlrzqvn';         // Mot de passe de l'adresse email à utiliser

        $mail->CharSet = 'UTF-8'; // Format d'encodage à utiliser pour les caractères

        $mail->From = $message3;                 // L'email à afficher pour l'envoi
        $mail->FromName = "$message4 $message2"; // L'alias à afficher pour l'envoi

        $mail->addAddress(trim('marc32994@gmail.com')); // Adresse de destination

        $mail->Subject = $subject;                // Le sujet du mail
        $mail->WordWrap = 50;                     // Nombre de caractères pour le retour à la ligne automatique
        $mail->AltBody = strip_tags($message);    // Texte brut pour les clients mail qui ne supportent pas HTML
        $mail->isHTML(true);                      // Préciser qu'il faut utiliser le format HTML
        $mail->Body = $message;                   // Contenu du mail en HTML


        $mail->addAttachment($_FILES['fillle']['tmp_name'], $_FILES['fillle']['name']);
        

        if ($mail->send()) {
            $_SESSION['message'] = " Votre plainte à été transmise avec succes";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            throw new Exception("L'envoi du courrier a échoué");
        }
    } catch (Exception $e) {
        header("Location: " . $_SERVER['HTTP_REFERER']); //permet de revenir a la page de soumission des plainte 
        exit;
    }
}

ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur
?>

