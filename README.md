# Exercice laravel_middleware_1
- Créez un projet avec 2 pages pour les utilisateurs et 1 backoffice
   - Accueil 
   - Article 
   - Backoffice 
- Créez un middleware
  - Si on est pas connecté on ne peut aller que sur la page Accueil
  - Si on est connecté on peut aller partout
# Exercice laravel_middleware_1_part_2
Faites un commit
- Créez un  middleware : RoleVerification
 - Si on est pas connecté on ne peut aller que sur la page Accueil
 - Si on est connecté on peut aller sur les pages Accueil et Article
- Si on est connecté et qu'on a le role Admin on peut aller partout
# Exercice laravel_middleware_1_part_3
Faites un commit
- Dans le back-office(page home) 
Rajoutez un lien dans le menu de gauche vers des pages pour un crud d'articles (id,titre,texte,user_id) 
   - Créate
   - Show
   - Edit
   - Delete
# Exercice laravel_middleware_1_part_4
1.Faire un commit
2.Créer un rôle Webmaster
- Le nombre membre a accès à Accueil
- Le membre a accès aux pages : Accueil et Articles( c'est une page avec la liste des titres des articles il faut cliquer dessus pour lire l'article)
- Le webmaster peut accéder a Accueil et Articles sur le site et dans le back office a Articles à toutes les methodes mais pas a la page "Users" cité dans le prochain point.
3.Créer une page users dans le backoffice( on y voit la liste des users, nom et role )
# Exercice laravel_middleware_1_part_5
1.Faire un commit
2.Créer un rôle Rédacteur
- Les rédacteurs peuvent accèder a toutes les pages saufe celle des users dans le backoffice
- Les rédacteurs ne peuvent accéder a l'édit et l'update et le delete uniquement que des articles qu'ils ont eux même créez, ils ne peuvent pas edit/update/delete les articles des autres.