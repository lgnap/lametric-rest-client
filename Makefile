.PHONY: default retrieve-last-openapi-spec generate-openapi-client php-cs-fixer help

default: help

generate: retrieve-last-openapi-spec generate-openapi-client php-cs-fixer ## Generate classes from fresh open-api.yml

docker-build: ## build
	docker-compose build

get-composer: ## Install composer through docker-compose
	wget  -O composer-installer https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer
	docker-compose run php php composer-installer
	rm composer-installer

retrieve-last-openapi-spec: ## retrieve last version of openapi online
	wget -O open-api.yml https://lametric.helpcomputer.org/openapi_v2.yml

composer-install: ## Run composer install
	docker-compose run php php composer.phar install

generate-openapi-client: ## Run jane to get openapi client classes
	docker-compose run php vendor/bin/jane-openapi generate

php-cs-fixer: ## Php-cs-fixer run on src/OpenAPIClient.
	docker-compose run php vendor/bin/php-cs-fixer --quiet fix src/OpenAPIClient

help: ## Show the help prompt.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
