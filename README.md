# Catálogo de imóveis - API Rest

### Instalação e utilização
  1. Instale as dependências, com o comando abaixo:
  ```
    composer install
  ```
  2. Execute a API, com o comando abaixo:
  ```
    php artisan serve
  ```

### Estrutura
Novo Usuário
```
  http:\\localhost\api\v1\users
```
Body
```
  {
    "name": "fulano",
    "email": "fulano@gmail.com",
    "password": "12345678",
    "profile": {
        "phone": "123",
        "mobile_phone": "123",
        "about": "sobre min...",
        "social_networks": [
            "http://fb.com/fulano",
            "https://instagram.com/fulano"
        ]
    }
}
```

### Modelo Relacional
<img align="center" height="600" src="https://github.com/welitto/catalogo_imoveis/blob/main/modelo_db.png"/>
