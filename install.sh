#!/usr/bin/env bash

LIGHT_BLUE='\033[1;34m'
LIGHT_GREEN='\033[1;32m'
NC='\033[0m'

printf "${LIGHT_GREEN}======== Installing Platform ========${NC}\n"

printf "${LIGHT_BLUE}Installing Env File${NC}\n"

cp .env.example .env
php artisan key:generate

printf "${LIGHT_BLUE}Installing Dependencies${NC}\n"

composer install
npm install
./modules.sh "npm install"

printf "${LIGHT_BLUE}Installing Database${NC}\n"

php artisan module:migrate
php artisan module:seed

printf "${LIGHT_GREEN}======== Platform Installed ========${NC}\n"
