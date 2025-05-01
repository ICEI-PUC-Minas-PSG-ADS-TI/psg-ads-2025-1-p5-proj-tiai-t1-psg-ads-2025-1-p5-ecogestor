#!/bin/bash
#Para executar este script, use o Terminal do Git Bash e chame com o comando: ./rodar.sh
echo "Iniciando o servidor PHP..."

# Caminho absoluto no estilo Git Bash/WSL
TARGET_DIR="/c/Users/Pichau/Documents/Projetos/PUC"

# Ir para o diretório correto
cd "$TARGET_DIR" || {
  echo "Falha ao acessar o diretório: $TARGET_DIR"
  exit 1
}

# Mostrar onde está e rodar o servidor PHP
echo "Diretório atual: $(pwd)"
php -S localhost:3000 &

# Esperar 2 segundos para garantir que o servidor iniciou
sleep 2

# Usar start no Windows para abrir o navegador automaticamente
start "" "http://localhost:3000/eco-gestor/src/"
