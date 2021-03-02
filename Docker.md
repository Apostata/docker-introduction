# Docker

para usar uma imagem da docker.hub,
basta usar o comando

`FROM {nome_da_imagem}`

Exemplo com o mysql:
`FROM mysql`

## variaveis de ambiente
````
FROM mysql
ENV MYSQL_ROOT_PASSWORD senha
````

## criando o container
rodar o comando
`docker build -t {nome_customizado_da_imagem} -f  {caminho_do_docker_file} .`

exemplo:
`docker build -t mysql-image -f  api/db/Dockerfile .`
`docker build -t node-image -f  api/Dockerfile .`

-t => Tag: dar nome a imagem
-f => File: especifica o arquivo que gerará as imagens
 . => Contexto: o ponto no final significa que o contexto do file system é de acordo com a pasta em que estamos executando o comando no momento.

## listar imagens
`docker image ls`

## Criando container
`docker run -d --rm --name {nome_do_container} {nome_customizado_da_imagem}`

exemplo:
`docker run -d --rm --name mysql-container mysql-image`
-d => Detach: executar em background
--rm => Remove: se o container já existir, remove-lo e criar um novo
--name => Nome: nome do container

## visualizando containers em funcionamento
`docker ps`

## Exxecutando comandos em um container
`docker exec -i {nome_do_container} {comando} < {caminho_do_script.extensão}` 

exemplo:
`docker exec -i mysql-container mysql -uroot -pteste < api/db/script.sql` 

-i => iterativo: sempre que executar um processo que usar o shell ou prompt, como ler um arquivo ou executa-lo
mysql -uroot -pteste = executar o script no mysql com usuário root e senha teste, para ter acesso ao terminal do container

## executando o terminal do container
`docker exec -it mysql-container //bin/bash` => windows
`docker exec -it mysql-container /bin/bash` => linux

-t => tty : terminal
/bin/bash(linguagem do terminal), vamos rodar o bash do container

## Criando volumes para não perder os dados
pelo gitbash:
`docker run -d -v C:/DEV/Rene/Docker-introducao/api/db/data:/var/lib/mysql --rm --name mysql-container mysql-image` => windows
provavelmente pelo cmd deve ser similar ao linux
`docker run -d -v $(pwd)/api/db/data:var/lib/mysql --rm --name mysql-container mysql-image` => linux

$(pwd) => working directory: retorna o diretório atual (no caso o do dodockerfile)

no caso de "api:/home/node/app" vc loga com o usuario 'node' e a aplicação está no diretorio 'app' para o linux
`docker run -d -v C:/DEV/Rene/Docker-introducao/api:/home/node/app -p 8091:8091 --link mysql-container --rm --name node-container node-image`

`docker run -d -v C:/DEV/Rene/Docker-introducao/website:/var/www/html -p 8888:80 --link node-container --rm --name php-container php-image`

-p: porta => -p 8888:80 porta 8888 do host acessa porta 80 do container -> php roda na porta 80 mas o host externaliza a porta 8888
-link: Alias => um apelido para ao invés de utilizar o ip do container, utiliza o nome para apontar para ele

## vendo ip do container
`docker inspect mysql-container`