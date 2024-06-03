<h1 align="center">
  <a href="https://germondai.rf.gd" target="_blank">
    <img align="center" src="https://skillicons.dev/icons?i=php,mysql,tailwind,jquery" /><br/><br/>
    <span>PHP Starter</span>&nbsp;
    <img src="public/assets/img/favicon.ico" alt="Rocket Icon" width="24"/>
  </a>
</h1>

This project **simplifies** starting new **PHP** projects. It's perfect if you want to **skip setting up basics** and **get coding quickly**. It **doesn't rely** on any **PHP framework**, making **configuration** easy and offering great **features**.

## ⚡️ Features

**Overview**

- Own REST API System
  - Routing
  - Auth
- Security
  - Routing
  - File and Dir access
- Custom Utils
  - Helper
  - Page Helper
  - Database
  - Doctrine
  - JSON Web Tokens
- Well Organized Structure
- Nette
  - Database Explorer
  - Tracy
- Doctrine
  - ORM
  - DBAL
  - Entities
  - Migrations
- Environment (.env)

## 🧬 Structure

**api/** - accessible on /api/_model_/_action_, (models and entities)\
**bin/** - Console for Doctrine\
**migrations/** - Doctrine DB Migrations\
**public/** - the main directory accessible from outside\
**src/** - contains includes, utils and dev assets\
**temp/** - Nette DB Temp Storage\

## 🧠 Technologies

- <a href="https://www.php.net/" target="_blank">PHP</a>
- <a href="https://tailwindcss.com/" target="_blank">TailwindCSS</a>
- <a href="https://jquery.com/" target="_blank">jQuery</a>
- <a href="https://www.doctrine-project.org/" target="_blank">Doctrine</a>
- <a href="https://doc.nette.org/en/database" target="_blank">Nette DB</a>
- <a href="https://jwt.io/" target="_blank">JSON Web Tokens (JWT)</a>

## 🛠️ Installation Instructions

Requirements

- 👨‍💻 <a href="https://getcomposer.org/" target="_blank">Composer</a>
- 📦 Node Package Manager (<a href="https://pnpm.io/" target="_blank">pnpm</a> - recommended)

**Install dependencies**

```bash
composer install
pnpm install
```

**Setup .env**

Fill in placeholders for database credentials in the .env file

```bash
# to dupe example.env as .env
cp example.env .env
```

## 🎨 Tailwind CSS Guide

It's main css is stored in "_src/assets/css/tailwind.css_"\
and its being converted into "_public/assets/css/style.css_"

### Conversion / Watch

```bash
# To convert it, you have to run
pnpm run watch:css

# or simply run start (does the same)
pnpm run start
```

## 📚 Doctrine Guide

The Doctrine console is in "_bin/console_"\
EntityManager config location "_src/Utils/Doctrine.php_"\
Base migrations config, which is in root "_migrations.php_"\
And migration files are stored in "_migrations/_"

### Console

```bash
# To run doctrine console
php bin/console ...

# if you need commands list
php bin/console list
```

<p align="center">
    <span>Made with ❤️ by</span>
    <a href="https://github.com/germondai" target="_blank">@germondai</a>
</p>
