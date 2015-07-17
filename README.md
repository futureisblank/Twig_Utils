# blank-twig-utils

## Installation

A ajouter dans le fichier composer.json
```
{
    "require": {
        "twig/blank": "dev-master"
    },
    "repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:futureisblank/Twig_Utils.git"
    }]
}
```

## Utils

### Component

Get a component :
``` {{ component( name, data ) }} ```

### Handlized

Transform a string to file format :
``` {{ handlized( string ) }} ```

### Icons

Get an icon : 
``` {{ icons( name ) }} ```
