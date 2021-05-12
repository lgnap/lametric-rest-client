.PHONY: default retrieve-last-openapi-spec generate-openapi-client php-cs-fixer help

default: help

generate: retrieve-last-openapi-spec generate-openapi-client php-cs-fixer ## Generate classes from fresh open-api.yml

retrieve-last-openapi-spec: ## retrieve last version of openapi online
	wget -O open-api.yml https://lametric.helpcomputer.org/openapi.yml

generate-openapi-client: ## Run jane to get openapi client classes
	vendor/bin/jane-openapi generate

php-cs-fixer: ## Php-cs-fixer run on src/OpenAPIClient.
	vendor/bin/php-cs-fixer --quiet fix src/OpenAPIClient

help: ## Show the help prompt.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
