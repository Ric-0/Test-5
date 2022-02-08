<nav class="navbar navbar-expand-lg navbar-light" style="z-index:1">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link<?php echo ($_GET["action"] == 'accueil') ? ' active' : ''; ?>" href="index.php?action=accueil&id=<?php echo $_SESSION["token"]; ?>">Accueil</a></li>
        <li class="nav-item"><a class="nav-link<?php echo ($_GET["action"] == 'ajoutLivre') ? ' active' : ''; ?>" href="index.php?action=ajoutLivre&id=<?php echo $_SESSION["token"]; ?>">Ajouter un livre</a></li>
        <li class="nav-item"><a class="nav-link<?php echo ($_GET["action"] == 'allLivre') ? ' active' : ''; ?>" href="index.php?action=allLivre&id=<?php echo $_SESSION["token"]; ?>">Liste des livres</a></li>
        <li class="nav-item"><a class="nav-link<?php echo ($_GET["action"] == 'deleteLivre') ? ' active' : ''; ?>" href="index.php?action=deleteLivre&id=<?php echo $_SESSION["token"]; ?>">Supprimer un livre</a></li>
        <li class="nav-item"><a class="nav-link<?php echo ($_GET["action"] == 'moncompte') ? ' active' : ''; ?>" href="index.php?action=moncompte&id=<?php echo $_SESSION["token"]; ?>">Mon Compte</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">Déconnexion</a></li>
      </ul>
    </div>
  </div>
</nav>