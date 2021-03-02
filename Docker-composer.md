# Docker composer
Serve para usar um ou mais dockerfiles de uma só vez, juntando todos arquivos necessários para rodar todos os containers da aplicação.

## rodar o docker-compose
`docker-compose up -d`

## parar os containeres
`docker-compose stop`

## alterar um unico container
`docker-compose up -d --no-deps --build <service_name>`
