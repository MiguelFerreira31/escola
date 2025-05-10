# 📚 Projeto: Sistema Escolar

Sistema web para gerenciamento escolar, desenvolvido com tecnologias modernas no front-end e back-end. O projeto segue a arquitetura **MVC (Model-View-Controller)** e utiliza um **framework próprio em PHP**, com foco em organização, escalabilidade e aprendizado prático.

---

## 🛠️ Tecnologias Utilizadas

### 🌐 Front-end
- **HTML5**: Estruturação semântica das páginas.
- **CSS3**: Estilização moderna e responsiva.
- **JavaScript**: Funcionalidades dinâmicas no lado do cliente.
- **Bootstrap**: Framework de componentes e layout responsivo.
- **Swiper.js**: Biblioteca de sliders/carrosséis modernos.
- **Smooth Scrollbar**: Personalização das barras de rolagem para melhor UX.

### 🧩 Back-end
- **PHP**: Utilizado para criar um framework próprio.
- **Arquitetura MVC**: Organização em camadas (Model, View, Controller).
- **MySQL**: Gerenciamento do banco de dados relacional.

---

## 🧱 Estrutura do Projeto

```bash
escola/
├── public/                 # Arquivos acessíveis ao público
│   ├── assets/            # CSS, JS, imagens e outros recursos estáticos
│   ├── uploads/           # Arquivos enviados via sistema
│   └── index.html         # Ponto de entrada da interface pública
│
├── vendor/                # Dependências 
│
├── core/                  # Núcleo do framework próprio (roteamento, controlador base, etc.)
│
├── config/                # Arquivos de configuração (ex: banco de dados)
│
├── app/                   # Lógica principal da aplicação
│   ├── controllers/       # Controladores que processam requisições
│   ├── models/            # Modelos que interagem com o banco de dados
│   └── views/             # Arquivos de visualização
│       └── templates/     # Templates reutilizáveis (header, footer, etc.)
