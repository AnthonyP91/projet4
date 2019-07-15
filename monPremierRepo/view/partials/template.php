<!DOCTYPE html>
<html lang="fr">

  <head>
    <title>Billet simple pour l'Alaska</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="/projet/public/css/style.css" rel="stylesheet" />
    <link href="/projet/public/css/homeView.css" rel="stylesheet" />
    <link href="/projet/public/css/postView.css" rel="stylesheet" />
    <link href="/projet/public/css/listPostsView.css" rel="stylesheet" />
    <link href="/projet/public/css/biographieView.css" rel="stylesheet" />
    <link href="/projet/public/css/listBooksView.css" rel="stylesheet" />
    <link href="/projet/public/css/adminOptionView.css" rel="stylesheet" />
    <link href="/projet/public/css/adminCreatePostView.css" rel="stylesheet" />
    <link href="/projet/public/css/editorView.css" rel="stylesheet" />
    <link href="/projet/public/css/adminFormView.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
  </head>

  <body>

        <header style="background-image:url('/projet/public/images/aurora.jpg')">
          
            <nav class="navbar navbar-default fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <a href="/projet/index.php?action=connexionAdmin"><i class="fas fa-user-lock"></i></a><!-- <i class="fas fa-lock-open"></i> -->
                  <a class="navbar-brand" href="/projet/index.php?action=biographie">Jean FORTEROCHE</a>
                </div>
                <div class=""> <!--collapse navbar-collapse-->
                  <ul class="nav navbar-nav navbar-right mr-auto">
                    <li class="nav-item"><a href="/projet/index.php">Accueil</a></li>
                    <li class="nav-item"><a href="/projet/index.php?action=listPosts">Liste des chapitres</a></li>
                    <li class="nav-item"><a href="/projet/index.php?action=biographie">Biographie</a></li>
                    <li class="nav-item"><a href="/projet/index.php?action=listBooks">Mes romans</a></li>
                  </ul>
                </div>
              </div>
            </nav>

            <div class="enTete">
              <h1>BILLET SIMPLE POUR </br>L'ALASKA</h1>
              <?php if(isset($textEnTete)){?>
                <p class="sousTitre"><?= $textEnTete ?></p>
              <?php } ?>
              <?php if(isset($tag)){?>
                <p class="tag">Chapitre <?= $tag ?></p>
              <?php } ?>
            </div>
          
        </header>
        
        <div style="margin-bottom:50px">
          <?= $content ?>
        </div>

        <footer class="fixed-bottom">

        </footer>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="/projet/public/js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>

</html>