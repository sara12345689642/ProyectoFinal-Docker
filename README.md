# Proyecto Final - Despliegue de Aplicación Web con Docker y CI/CD

## Descripción

Este proyecto es una aplicación web desarrollada en PHP que utiliza Docker para su despliegue y GitHub Actions para implementar un pipeline de integración continua.

##  Stack tecnológico

- PHP 8.2 con Apache
- MySQL 8.0
- Docker y Docker Compose
- GitHub Actions (CI/CD)

##  Estructura del proyecto

- `Dockerfile`: Define cómo construir la imagen PHP+Apache.
- `docker-compose.yml`: Orquesta los servicios de la aplicación y la base de datos.
- `.env`: Contiene variables de entorno como el nombre de la base de datos.
- `.github/workflows/deploy.yml`: Archivo que define el pipeline CI/CD con GitHub Actions.

## ▶ Pasos para ejecutar la aplicación

1. Clonar el repositorio:

```bash
git clone https://github.com/sara12345689642/ProyectoFinal-Docker.git
cd ProyectoFinal-Docker
