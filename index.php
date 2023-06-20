<?PHP
    session_start();
    require_once("controleur/config_bdd.php");
    require_once("controleur/controleur.class.php");

    //Instanciation de la Classe Controleur
    $unControleur= new Controleur($serveur, $bdd, $user, $mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/ehoui.css">  
    <title>Sony Music FR</title>
</head>
<body>
    <center>
    <nav id="myNavbar" class="navbar navbar-dark sticky-top">
        <h1><a href="index.php"><img src="images/logosony.png" height="75"></a></h1>
            <div class="container-fluid">
              <a class="navbar-brand" href=""></a>
              <button class="navbar-toggler" style="background-color: #000000" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav"> 

        <a href="index.php?page=0">
            <img src="images/home.png" width="50" height="50" /> <p> Accueil </p>
        </a>
        <a href="index.php?page=1">
            <img src="images/label.jpeg" width="50" height="50" /> <p> Labels </p>
        </a>
        <a href="index.php?page=2">
            <img src="images/partenaire.jpeg" width="50" height="50" /> <p> Partenaires </p>
        </a>
        <a href="index.php?page=3">
            <img src="images/agent.png" width="50" height="50" /> <p> Agents </p>
        </a>
        <a href="index.php?page=4">
            <img src="images/artiste.jpeg" width="50" height="50" /> <p> Artistes </p>
        </a>
        <a href="index.php?page=8">
            <img src="images/categorie.png" width="50" height="50" /> <p> Catégories </p>
        </a>
        <a href="index.php?page=9">
            <img src="images/album.jpg" width="50" height="50" /> <p> Albums </p>
        </a>
        <a href="index.php?page=10">
            <img src="images/chanson.png" width="50" height="50" /> <p> Chansons </p>
        </a>
        <a href="index.php?page=11">
            <img src="images/vente.jpg" width="50" height="50" /> <p> Ventes </p>
        </a>
        <a href="index.php?page=5">
            <img src="images/deconnexion.jpeg" width="50" height="50" /> <p> Déconnexion </p>
        </a>
        <a href="index.php?page=7">
            <img src="images/profil.png" width="50" height="50" /> <p> Profil </p>
        </a>
        <?php
        if($_SESSION['role']=='dirigeant'){
            echo '<a href="index.php?page=20">
            <img src="images/stats.jpg" width="50" height="50" /> <p> Stats </p>
          </a>';
        }
            
        ?>
        </div>
              </div>
            </div>
            
          </nav>

          <section id="tableau" class="container-fluid table-sm">
        <?php
            if(!isset($_SESSION['email'])){
                //S'il n'y a pas de connexion
                require_once("vues/vue_connexions.php");
            }
            if(isset($_POST["Connecter"])){
                //Verification si l'user existe
                $email=$_POST['email'];
                $mdp=$_POST['mdp'];
                $unUser= $unControleur->selectUser($email,$mdp);
                if($unUser==null){
                    //S'il n'y pas d'User
                    echo 'Veuillez vérifier vos identifiants !';
                }
                else{
                    //Connexion réussie !
                    $_SESSION['iduser']=$unUser['iduser'];
                    $_SESSION['nom']=$unUser['nom'];
                    $_SESSION['email']=$unUser['email'];
                    $_SESSION['mdp']=$unUser['mdp'];
                    $_SESSION['telephone']=$unUser['telephone'];
                    $_SESSION['role']=$unUser['role'];
                    //On recharge la page vers home
                    //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                    echo "<script>document.location.href='index.php?page=0';</script>";

                }
            }
            
            $page=(isset($_GET['page'])) ? $_GET['page'] : 0;
            switch($page){
                case 0:
                    require_once("home.php");
                break;
                case 1:
                    require_once("labels.php"); //fait dans la totalité
                break;
                case 2:
                    require_once("partenaires.php");
                break;
                case 3:
                    require_once("agents.php"); //fait dans la totalité
                break;
                case 4:
                    require_once("artistes.php");
                break;
                case 5:
                    session_destroy(); 
                    unset($_SESSION);
                    //Le header Location en php ne fonctionne pas correctement, remplacement par javascript
                    echo "<script>document.location.href='index.php';</script>";
                break;
                case 6:
                    require_once("cgu.php");
                break;
                case 7:
                    require_once("profil.php");
                break;
                case 8:
                    require_once("categories.php");
                break;
                case 9:
                    require_once("albums.php");
                break;
                case 10:
                    require_once("chansons.php");
                break;
                case 11:
                    require_once("ventes.php");
                break;
                case 20:
                    require_once("statsArtistes.php");
                break;
            }
        ?>
        </section>
    </center>

    <div class="footer-dark">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>A PROPOS DE</h3>
                        <ul>
                            <li><a href="index.php?page=6">Mentions Légales</a></li>
                            <li><a href="https://fr.wikipedia.org/wiki/Sony_Music_Entertainment" target="_blank">L'entreprise</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>SONY MUSIC FRANCE</h3>
                        <p> Sony Music Entertainment est un label de disques contrôlé par </p>
                        <p> Sony Corporation of America. C'est l'un des trois plus grands labels </p>
                        <p> discographiques du monde derrière Universal Music et devant Warner Music. </p>
                    </div>
                </div>
                <div class="col item social">
                        <a href="https://fr-fr.facebook.com/sonymusicfr/" target="_blank"><i class="icon ion-social-facebook"></i></a>
                        <a href="https://twitter.com/SonyMusicFr" target="_blank"><i class="icon ion-social-twitter"></i></a>
                        <a href="https://www.snapchat.com/add/sonymusicfrance" target="_blank"><i class="icon ion-social-snapchat"></i></a>
                        <a href="https://www.instagram.com/sonymusicfrance/" target="_blank"><i class="icon ion-social-instagram"></i></a>
                        <p class="copyright">SONY MUSIC ENTERTAINMENT © 2023</p>
                    </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>