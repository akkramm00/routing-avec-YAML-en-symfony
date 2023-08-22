<html>
  <head>
    <title>YAML routing</title>
  </head>
  <body>
    <h2>Le routing avec YAML</h2>
    <p>
      Avant de voir comment on, configure un fichier "YAML", sachez qu'il est possiblme, même si cela n'est pas un avantage, de choisir dans un même controller des méthodes différentes de configuration de routing.
      Pa exemple, une méthode de controlleur aura une route configurer avec php attributes et une autre méthode de ce même controller peut etre configurée à partir du fichier routes.yaml
    </p>

     <h2>Méthode</h2>
    <p>
      Voyons à présent comment créer des routes en "YAML".Dans le fichier routes.yaml, qui se trouve dans le dossier config à la racine du projet, indiquezle nom de la méthopde du controlleurque vous souhaitez associer à la route.
      En desous , avec une indentation dans "path", indiquez le chemin de la route avec ses eventuels paramètres puis encore en dessous dans "controller", indiquez le chemin d'accès jusqu'au controlleur.

      Si vous souhaitez ajouter d'autres paramètres de routes , vous pouvez les ajouter une à une en respectant bien l'indentation(utilisez des espaces et non des tabulations). En effet, la syntaxe Yaml y est très sensible
    </p>
    
c

    <?php
list:
    path: /tasks
    controller: App\Controller\TaskController::list

task_show:
    path: /task/{id<\d+>?0}
    controller: App\Controller\TaskController::task_list
    methods: [GET, POST]
    schemes: [https]
?>

    <p>
      on remarque certainement que le principe rest le même qu'avec le système d'annotation.
      Par exemple, dans la méthode task_show, il y'a dans path un paramètre dynamiquesuivientre chevrons d'un requirement ainsi que d'une valeur par defaults. "requirement" et "defaults" auraient aussi pu etre énumérés en desssous.
    </p>

     <h2>Remarque</h2>

    Si vous choisissez de définir l'ensemble de vos routes en YAMLalors il est préférable pour une meilleure organisation, de créer dans le dossier routes (qui se trouve dans le dossier config à la racine du projet), des fichiers qui  seront classés dans des dossiers, suivant l'arborescence que vous désirer, contenant chacun sa route.

    Ainsi vous aurez :

    config\
        routes\
            users\
                tasks\
                    index.yaml
                    task_show.yaml

    imaginez maintenant que pour une quelconque raison, une route de votre application n'existe plus.
    Symfony propose un controller de redirection afin que les utilisateurs soient redirigés vers la pageque vous avez complacer.

     <h2>Exemple</h2>
    
    <?php

redirection_vers_nouvelle_page
    path: / ancienne_page
    controller: Symfony\Bundle\Frameworks\Controller\RedirectController
    defaults:
        route: 'nom_nouvelle_route'
        pernament: true
        keepQueryParams: true
    
?>

    

  
  </body>
</html>