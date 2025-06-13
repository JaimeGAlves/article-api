# 📚 Article API & Web Interface

Este projeto Laravel fornece uma API para gerenciar artigos e uma interface web moderna e responsiva para visualização e edição.

## ⚛️ Requisitos

- PHP >= 8.1
- Composer
- MySQL

---

## ⚙️ Instalação

```bash
# Clone o projeto
git clone https://github.com/JaimeGAlves/article-api.git
cd article-api

# Instale as dependências PHP
composer install

# Copie o arquivo .env e configure
cp .env.example .env
```

### 🔑 Gere a chave de aplicação

```bash
php artisan key:generate
```

---

## 🛠️ Configuração

### Banco de Dados

No arquivo `.env`, configure sua conexão com o MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=article_api
DB_USERNAME=root
DB_PASSWORD=
```

### 🗄️ Criação do Banco de Dados

1. Crie o banco de dados no MySQL:

```sql
CREATE DATABASE article_api CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Rode as migrações para gerar as tabelas necessárias:

```bash
php artisan migrate
```

---

## 💡 Executando o Projeto

```bash
php artisan serve
```

Acesse no navegador: [http://localhost:8000](http://localhost:8000)

---

## 💽 Funcionalidades

- 🌐 **Interface Web**
  - Tema escuro e claro
  - Listagem, criação e edição de artigos
- 📦 **API RESTful**
  - `POST /api/articles` – Criar
  - `GET /api/articles` – Listar todos
  - `GET /api/articles/{id}` – Detalhar
  - `PUT /api/articles/{id}` – Atualizar
  - `DELETE /api/articles/{id}` – Remover
- 📄 **Swagger UI**
  - Disponível via `/api/documentation`

---

## 📸 Créditos

Desenvolvido por Jaime com Laravel 12, TailwindCSS e muito carinho.