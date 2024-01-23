# Teste cadastro de endereços Revenda Mais

Este projeto consiste em uma API REST voltada a persistencia e busca de endereços com base no CEP, esta possui uma integração com o ViaCep para buscar novos endereços.

## Instalação

Inicie criando um arquivo .env na raiz do projeto a partir do arquivo .env.example.
Este projeto funciona com uma instancia docker configurada para rodar a API por meio do nginx e uma instância mysql. Tendo um ambiente com o docker configurado rodar os seguintes comandos:

```bash
docker-compose build app
docker-compose up -d
```

Isso vai criar a imagem e subir o container, na sequência é necessário instalar as dependencias do projeto, para isso rode o seguinte comando:

```bash
docker exec -it teste-revendamais-api composer install
```

Com todo o projeto configurado o ultimo passo é criar o banco de dados e popular com dados teste:

```bash
docker exec -it teste-revendamais-api php artisan migrate --seed
```

Dessa forma a api vai estar pronta para uso rodando na porta 8000