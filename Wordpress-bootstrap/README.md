# Wordpress Framework 3

Bootstrap, Vagrant, Grunt, Automatic database export and import, git modules for plugin dependances.

## Getting started

1. Create a new repository on bitbucket.
2. Download (or clone) the framework repository and copy the files into the repository for your project
3. Change the theme name from 'framework'
4. Update style.css in the theme root 
5. **Gruntfile.js** Update the path to the theme
6. Open the .gitmodules file and add the modules to your new project repo you can do this in SourceTree `Repository > Add Submodile` be sure to select a specific branch for Wordpress
7. Install Grunt `npm install`
8. Install Bower Dependancies `bower install`

## Deployment
The `dist/` directory only should be deployed. Be sure to take a look at the **wp-config.php**. Its a little different...