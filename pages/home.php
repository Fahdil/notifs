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
            <form action="/pages/tt_form.php" method="POST">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Numéro de téléphone:</label>
            <input type="tel" id="phone" name="phone">

            <label for="badperson">Information concernant l'haceleur:</label>
            <textarea id="badperson" name="badperson" rows="3"></textarea>

            <label for="date">Date de l'incident:</label>
            <input type="date" id="date" name="date" required>

            <label for="location">Lieu de l'incident:</label>
            <input type="text" id="location" name="location" required>

            <label for="type">Type d'incident:</label>
            <select id="type" name="type" required>
                <option value="">Sélectionnez un type</option>
                <option value="abuse">Abus</option>
                <option value="harassment">Harcèlement</option>
                <option value="bullying">Intimidation</option>
                <option value="menace">Menace</option>
                <option value="other">Autre</option>
            </select>

            <label for="description">Description de l'incident:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="witnesses">Témoins présents (si applicable):</label>
            <textarea id="witnesses" name="witnesses" rows="3"></textarea>

            <label for="action">Action souhaitée:</label>
            <textarea id="action" name="action" rows="3"></textarea>

            <label for="file">Joindre des fichiers (si nécessaire):</label>
            <input type="file" id="file" name="file">

            <button type="submit">Soumettre</button>
        </form>
     </div>   

    </body>
    <footer>

    </footer>
</html>
