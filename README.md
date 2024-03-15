# Install
    npm install -g bower
# Keep

    [CATEGORIES DE NOTE]
    [Card]
        [FORMULAIRE D AJOUT]
    [LIST DES NOTES]
        -Modifier
        -Supprimer
# Database : 
    - notes
        - id Int
        - title String
        - description Text
        - createdAt (date)
        - updatedAt (date)
    - categories
        - id Int
        - label String
        - allowDelete Boolean
        - createdAt (date)
        - updatedAt (date)
    - categories_notes
        - id Int
        - notes_id Int
        - categories_id Int
        - createdAt (date)
        - updatedAt (date)