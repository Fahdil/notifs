<!DOCTYPE HTML>
<html>
    <head>
        <title>Notifs</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/home.css">
    </head>
    <body>
        <div class="container">
            <h1> Effectuer un signalement </h1>
            <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<div class='message'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>
    <form action="/pages/tt_form.php" method="post" enctype="multipart/form-data">
        <label for="name">Votre Nom:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Votre Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Votre Numéro de Téléphone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="badperson">Nom du Harceleur:</label>
        <input type="text" id="badperson" name="badperson" required><br>

        <label for="date">Date de l'Incident:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="location">Lieu de l'Incident:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="description">Description de l'Incident:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="witnesses">Témoins (s'il y en a):</label>
        <input type="text" id="witnesses" name="witnesses"><br>

        <label for="action">Actions Entreprises:</label>
        <input type="text" id="action" name="action"><br>

        <label for="type">Type d'Abus:</label>
        <select id="type" name="type" required>
            <option value="verbal">Verbal</option>
            <option value="physique">Physique</option>
            <option value="cyber">Cyber</option>
        </select><br>

        <label for="fillle">Joindre des Fichiers (si nécessaire):</label>
        <input type="file" id="fillle" name="fillle"><br>

        <input type="submit" value="submit" name="submit">
    
        </form>
     </div>   

    </body>
    <footer>

    </footer>
</html>
