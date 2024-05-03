# PHP Starter &nbsp;<img src="public/assets/img/favicon.ico" alt="Rocket Icon" width="24"/>

Simple **PHP Starter** with features like

- Tailwind CSS
- jQuery
- Nette
  - DB Explorer
  - Tracy Dump
- Environment (.env)
- Clean Interface 🤩

## Structure

**public** - the only directory accessible from outside (by visitors)\
**src** - contains includes, utils and dev assets\
**temp** - storage for nette db explorer

## Installation Guide

Requirements

- Composer
- Node Package Manager (pnpm - recommended)

**Composer**

```bash
composer install
```

**Node Packages**

```bash
pnpm install
```

## Tailwind CSS Guide

It's main css is stored in "_src/assets/css/tailwind.css_"\
and its being converted into "_public/assets/css/style.css_"

### Conversion / Watch

To convert it, you have to run _watch:css_

```bash
pnpm run watch:css
```

or simply run _start_ (does the same)

```bash
pnpm run start
```
