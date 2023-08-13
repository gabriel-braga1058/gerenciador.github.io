// Você pode adicionar interatividade aqui se necessário
console.log("Dashboard carregada!");

// Exemplo de carregamento de conteúdo nas páginas
const mainContent = document.querySelector('.content');

const pages = {
  
  'Inicio': '<h1>Inicio/Clientes</h1>',
  'Registrar Cliente': '<h1>Registrar Clientes</h1>',
  'Atualizações': '<h1>Atualização</h1>',
  'Sair': '<h1>Conteúdo da Página 5</h1>',
};

// Carregar conteúdo da página ao clicar no link da sidebar
const sidebarLinks = document.querySelectorAll('.sidebar a');
sidebarLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    const pageTitle = event.target.textContent;
    mainContent.innerHTML = pages[pageTitle];
  });
});
