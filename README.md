# Treemap de Distribuição Orçamentária

Este projeto é uma aplicação Laravel que visualiza a distribuição orçamentária de diferentes departamentos de uma empresa usando um treemap. A aplicação destaca as mudanças no orçamento em relação ao ano anterior, utilizando uma lógica de cores para indicar aumentos (verde) e reduções (vermelho).

## Funcionalidades

-   **Visualização em Treemap:** Os departamentos são representados por retângulos proporcionais ao orçamento atual.
-   **Cores Dinâmicas:** Verde para aumentos e vermelho para reduções, com intensidade da cor baseada na magnitude da variação.
-   **Comparação Anual:** Mostra a variação percentual no orçamento de cada departamento em comparação com o ano anterior.

## Tecnologias Utilizadas

-   Laravel 10: Framework PHP utilizado para a construção do backend.
-   D3.js: Biblioteca JavaScript para renderização do treemap.
-   Bootstrap: (Opcional) para estilização básica da interface, se necessário.

## Requisitos

-   PHP >= 8.1
-   Composer
-   Node.js e NPM/Yarn (para gerenciamento de pacotes front-end)
-   MySQL (ou outro banco de dados compatível com Laravel)

## Instalação

Siga as instruções abaixo para configurar e rodar o projeto localmente.

### Passo 1: Clone o Repositório

Clone este repositório para sua máquina local usando o seguinte comando:

```bash
git clone https://github.com/marcellacamara/treemap-distribuicao-orcamentaria.git
```

### Passo 2: Instale as Dependências

Navegue até o diretório do projeto e instale as dependências do Composer:

```bash
cd treemap-distribuicao-orcamentaria
composer install
```

### Passo 3: Configure o arquivo .env

Copie o arquivo de exemplo .env.example para .env e configure as credenciais do banco de dados:

```bash
cp .env.example .env
```

No .env, configure o banco de dados:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### Passo 4: Gere a chave da aplicação:

```bash
php artisan key:generate
```

### Passo 5: Execute as migrações e seeders para criar e popular o banco de dados:

```bash
php artisan migrate --seed
```

### Passo 6: Instale as dependências do NPM:

```bash
npm install
```

### Passo 7: Compile os assets front-end:

```bash
npm run dev
```

### Passo 8: Inicie o servidor local:

```bash
php artisan serve
```

Isso iniciará o servidor em http://localhost:8000.

## Estrutura do Projeto

-   **Controllers:** Toda a lógica de controle está em BudgetController.php.
-   **Models:** A model Budget lida com os dados de orçamento.
-   **Services:** A classe ColorIntensityCalculator calcula as cores baseadas na variação orçamentária.
-   **Views:** A view budgets/index.blade.php renderiza o treemap usando D3.js.

## Explicação da Lógica

A aplicação calcula a variação percentual do orçamento de cada departamento em relação ao ano anterior. A cor do retângulo no treemap é calculada com base nessa variação, onde verde indica aumento e vermelho indica redução. A intensidade da cor é proporcional à magnitude da variação, tornando as mudanças mais visíveis.

Desenvolvido com ♥ por Marcella Câmara.
