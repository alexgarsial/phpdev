<?php
$currentUser = $currentUser ?? false;
?>


<header>
    <div class="mobile-menu">
        <a href='/index.php' class="logo">WEBBE </a>
        <span class="material-icons" onclick="toggler()" id="toggler">menu
        </span>
    </div>
    <div class="menu">
        <a href='/index.php' class="logo">Webbe </a>
        <ul class="header-menu">
            <?php if ($currentUser) : ?>
                <li>
                    <a href="/auth-logout.php">Déconnexion</a>
                </li>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/form-article.php' ? 'active' : '' ?>>
                    <a href="/form-article.php">Créer un article</a>
                </li>
                <li class="<?= $_SERVER['REQUEST_URI'] === '/profile.php' ? 'active' : '' ?> header-profile">
                    <a href="/profile.php"><?= $currentUser['firstname'][0] . $currentUser['lastname'][0] ?></a>
                </li>
            <?php else : ?>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/auth-login.php' ? 'active' : '' ?>>
                    <a href="/auth-login.php">Connexion</a>
                </li>
                <li class=<?= $_SERVER['REQUEST_URI'] === '/auth-register.php' ? 'active' : '' ?>>
                    <a href="/auth-register.php">Inscription</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

    <script>
        function toggler() {
            const icon = document.querySelector("#toggler");
            const menu = document.querySelector(".menu");

            // Vérifiez la largeur de l'écran avant d'exécuter le code
            if (window.innerWidth <= 810) { // Condition uniquement pour mobile
                if (icon.innerHTML.trim() === "menu") { // .trim() pour éviter les espaces inattendus
                    icon.innerHTML = "close";
                    menu.style.display = "block";
                } else {
                    icon.innerHTML = "menu";
                    menu.style.display = "none";
                }
            }
        }
        window.addEventListener("resize", () => {
            const menu = document.querySelector(".menu");
            const icon = document.querySelector("#toggler");

            if (window.innerWidth > 810) { // Si desktop
                menu.style.display = "flex"; // Assurez-vous que le menu est visible
                icon.innerHTML = "menu"; // Réinitialisez l'icône
            } else { // Si mobile
                menu.style.display = "none"; // Cachez le menu
            }
        });
    </script>
</header>