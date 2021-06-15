# Creation d'un site de prêt de matériel en ligne

# symfony new Sessad-Pretotheque --full

# Filtrer les recherches d'articles par categorie:

Dans src/Classe, nous avons créé une nouvelle classe Search.php qui permet de représenter la recherche du user sous forme d'objet,
Donc cet objet recherche, classe , permet de créer un formulaire SearchType, et de lier dans ce formulaire la fonction ConfigureOptions()
qui associe, lie 'data_class' à Search::class.

On a aussi utlilisé la fonction buildForm pour créer le formulaire, avec 3 entrées: - string pour la recherche textuelle (dans la barre de recherche ) - categories qui représente ce qu'on peut cocher en checkbox

    Ca  représente les 2 propiétés de la classe Search:

{
/\*\*
_ @var string
_/
public $string = '';

    /**
     *
     *
     * @var Category[]
     */
    public $categories = [];

}

Dans le searchType, on a créé le submit;
On a le typage entityType::class qui permet de lier une entrée (input , propriété du formulaire) en disant qu'on veut que cela représente une entité; cela grace a la clé 'class' => Category::class, qui fait le lien avec category (car on veut afficher les categories)

Une fois le formulaire créé, on va dans ArticleController pour pouvoir traiter le formulaire
On instancie la classe Search qu'on passe a la methode createForm
On a écouté le formulaire $form->handleRequest($request); on a demandé si formulaire était soummis et valide,
si oui, on va dedans et on appelle Article repository, et on a créé une nouvelle méthode "findWithSearch".
Un repository permet d'aller chercher de la data; alors que dans le controller c'est la "logique"

Dans ArticleRepository, on a créé la fonction findWithhSearch, et avec une requete grace a Doctrine et ses outils.

On a créé une $query qui selectionne categorie et article;
On utilise des alias pour les tables (p, a, c)
On fait une jointure entre les produits et les catégories
Si l'user renseigne des categories a rechercher ca execute :
$query = $query
->andWhere('c.id IN (:categories)')
->setParameter('categories', $search->categories);

si l'user renseigne un texte a rechercher ca execute:
$query = $query
                ->andWhere('p.name LIKE :string')
                ->setParameter('string', "%{$search->string}");
