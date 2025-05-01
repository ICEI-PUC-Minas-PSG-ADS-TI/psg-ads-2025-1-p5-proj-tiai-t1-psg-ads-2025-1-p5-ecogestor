#!/bin/bash
#Para executar este script, use o Terminal do Git Bash e chame com o comando: ./rodar.sh
echo "Iniciando o servidor PHP..."

# Caminho absoluto do diretório onde está este script
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

# Caminho dois níveis acima (até a pasta PUC)
TARGET_DIR="$(cd "$SCRIPT_DIR/../.." && pwd)"

# Ir para o diretório PUC
cd "$TARGET_DIR" || {
  echo "Falha ao acessar o diretório: $TARGET_DIR"
  exit 1
}

# Mostrar onde está e rodar o servidor PHP
echo "Diretório atual: $(pwd)"
php -S localhost:3000 &

# Esperar 2 segundos para garantir que o servidor iniciou
sleep 2

# Abrir o navegador apontando para a URL inicial
start "" "http://localhost:3000/eco-gestor/src/"
