# lametric-rest-client

## Contexte
Client PHP pour l'API REST LaMetric : client généré par Jane (OpenAPI 3) dans `src/OpenAPIClient`, plus un
wrapper écrit à la main dans `src/Wrapper` pour simplifier les appels. Namespace `LGnap\`, PSR-4 (`src/`),
tests dans `tests/` (`LGnap\Tests\`).

## Commandes
- Installer : `composer install`
- Tests : `vendor/bin/phpunit` (config `phpunit.xml.dist` : échoue sur warning et deprecation)
- Régénérer le client : Jane (`jane-php/open-api-3`, dev dep) avec `.jane-openapi` (spec `open-api.yml`,
  sortie `src/OpenAPIClient`). Ne pas éditer le code généré à la main.

## CI
`.github/workflows/tests.yml` : PHPUnit sur PHP 8.1 à 8.4 (dépendances `highest`) + 8.1 en `lowest`.
Le lock n'est pas utilisé en CI (il embarque Symfony 7.4, PHP >= 8.2).

## Pièges
- `composer.json` exige PHP ^8.1 (migration PHP 8 / Jane 7 faite, PR #1) ; le message du commit CI
  mentionne PHP 7.4, c'est périmé.
- Les tests utilisent un client HTTP mock (`php-http/mock-client`, `tests/MockClientStrategy.php`).
- `php-http/discovery` : plugin désactivé dans `config.allow-plugins`.

## Forge
Dépôt sur GitHub (`origin` = lgnap/lametric-rest-client) : aucune trace de Claude. Commiter avec l'identité de
l'utilisateur (`env -u GIT_AUTHOR_NAME -u GIT_AUTHOR_EMAIL -u GIT_COMMITTER_NAME -u GIT_COMMITTER_EMAIL git -c commit.gpgsign=false commit …`),
pas de trailer, ne jamais pousser vers GitHub. Ne pas contourner le hook commit-msg (`--no-verify`).
