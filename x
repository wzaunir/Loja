php bin/console server:start // inicializa o symphony
php bin/console server:stop
php bin/console generate:doctrine:crud
php bin/console doctrine:schema:update --force
php bin/console doctrine:generate:entities HeringBundle
php bin/console doctrine:database:create
php bin/console generate:bundle
sudo composer.phar self-update
composer.phar create-project symfony/framework-standard-edition Loja
chmod +x composer.phar
