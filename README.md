# Teste cadastro de endereços Revenda Mais

Este projeto consiste em uma API REST voltada a persistencia e busca de endereços com base no CEP, esta possui uma integração com o ViaCep para buscar novos endereços.

## Instalação

Inicie criando um arquivo .env na raiz do projeto a partir do arquivo .env.example com o seguinte comando:
```bash
cp .env.example .env
```

Este projeto funciona com uma instancia docker configurada para rodar a API por meio do nginx e uma instância mysql. Tendo um ambiente com o docker configurado rode o seguinte comando para criar a imagem do projeto:

```bash
docker-compose build app
```

Em seguida rodamos o projeto com:

```bash
docker-compose up -d
```

Após criar a imagem e subir o container, é necessário instalar as dependencias, para isso rode o seguinte comando:

```bash
docker exec -it teste-revendamais-api composer install
```

Com todo o projeto configurado o ultimo passo é criar o banco de dados e popular com dados teste:

```bash
docker exec -it teste-revendamais-api php artisan migrate --seed
```

Dessa forma a api vai estar pronta para uso rodando na porta 8000