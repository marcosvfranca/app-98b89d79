# Para executar o projeto deve-se ter instalado o Docker e NodeJS.

## Versao PHP = 7.4
## Versao Laravel = 8
## Versao VueJS = 2


# Baixando o projeto e executando o backend
```bash
git clone https://github.com/marcosvfranca/app-98b89d79.git
cd app-98b89d79
``` 
Copie o arquivo ./src/.env.example renomeando para ./src/.env e execute o comando a seguir

```bash
docker-compose up --build -d
```

## Execute os comandos a seguir para instalar as dependencias do backend

```bash
docker-compose exec app composer install
docker-compose exec app php artisan migrate
```

## Executando os testes

```bash
docker-compose exec app composer test
```

# Executando o frontend

Copie o arquivo ./web/.env.example renomeando para ./src/.env.local e execute o comando a seguir

```bash
cd ./web/
npm install
npm run serve
```

### Após a execução dos comandos acima, acessar a url retornada pelo console e utilzar a aplicação.

#### Obs.: Foi utilizado a biblioteca AXIOS para requisições HTTP.

# Rotas do backend
```
| METHOD | Endpoint                                   | Ação                                    |
 ----------------------------------------------------------------------------------------------- 
| GET    | http:/localhost:8000/api/products          | Listagem de produtos                    |
| POST   | http:/localhost:8000/api/products          | Cadastro de produtos                    |
| GET    | http:/localhost:8000/api/products/movement | Listagem das movimentações dos produtos |
| POST   | http:/localhost:8000/api/products/movement | Cadastro da movimentação de produtos    |
 ----------------------------------------------------------------------------------------------- 
```
### Para executar requisições em aplicativos como Insominia ou Postman, por exemplo. Informar o header:
```
Accept=application/json
```
### Para popular o banco de dados, com dados aleatórios, execute o seguinte comando
```
docker-compose exec app php artisan db:seed
```