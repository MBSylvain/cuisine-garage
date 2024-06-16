<header>
    <?php
    include('C:\xampp\htdocs\cuisine\includes\header.php');
    ?>
</header>

<body>
    <div class="card-contact">
        <h2>Laissez votre commentaire</h2>
        <div class="card-com">
            <form id="comment-form" action="./cuisine/commentaires/ajoutcom.php" method="post">
                <label for="firstName">Prénom :</label><br>
                <input type="text" id="firstName" name="firstName" required><br><br>

                <label for="lastName">Nom :</label><br>
                <input type="text" id="lastName" name="lastName" required><br><br>

                <label for="email">Adresse email :</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="rating">Note sur 5 :</label><br>
                <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

                <label for="comment">Commentaire :</label><br>
                <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>

                <input type="submit" value="Soumettre" class="boutton-contact">
            </form>
        </div>
    </div>
    </div>
    <footer>
        <?php include('C:\xampp\htdocs\cuisine\includes\footer.php') ?>
    </footer>