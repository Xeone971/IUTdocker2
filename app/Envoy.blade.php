@servers(['web' => ['lucca-collas@13.39.150.46']])

@task('deploy', ['on' => 'web'])
cd lucca-collas.dhonnabhain.me/app
    # Mettre à jour les dépendances Composer
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Effectuer les migrations
    php artisan migrate --force

    # Optimiser l'application (optionnel)
    php artisan optimize

    # Ajoutez d'autres tâches si nécessaire

    echo "Deployment completed!";
@endtask
