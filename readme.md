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

- Secured Routing
- Own API System
- Organized Structure
- Nette
  - Database Explorer
  - Tracy
- Environment (.env)

## 🧬 Structure

**api/** - accessible on /api/_model_/_action_, contains models\
**public/** - the main directory accessible from outside\
**src/** - contains includes, utils and dev assets\

## 🧠 Technologies

- <a href="https://www.php.net/" target="_blank">PHP</a>
- <a href="https://tailwindcss.com/" target="_blank">TailwindCSS</a>
- <a href="https://jquery.com/" target="_blank">jQuery</a>

## 🛠️ Installation Instructions

Requirements

- 👨‍💻 <a href="https://getcomposer.org/" target="_blank">Composer</a>
- 📦 Node Package Manager (<a href="https://pnpm.io/" target="_blank">pnpm</a> - recommended)

**Install dependencies**

```bash
composer install
pnpm install
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

<p align="center">
    <span>Made with ❤️ by</span>
    <a href="https://github.com/germondai" target="_blank">@germondai</a>
</p>
