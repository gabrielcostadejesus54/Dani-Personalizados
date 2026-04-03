// modal
var btnNovoProduto = document.getElementById('btn-novo-produto');
var modal = document.querySelector('.modal');
var closeBtn = document.querySelector('.close');

function abrirModal() {
    modal.style.display = 'block';
}

closeBtn.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}


//Buscador produtos
const input = document.getElementById("search");
const produtos = document.querySelectorAll(".produto");

input.addEventListener("input", function () {
    const valor = input.value.toLowerCase();

    produtos.forEach(produto => {
        const nome = produto.querySelector(".nome-produto").textContent.toLowerCase();

        if (nome.includes(valor)) {
            produto.style.display = "block";
        } else {
            produto.style.display = "none";
        }
    });
});

// Paginas produto e galeria
const links = document.querySelectorAll(".nav a");
const paginas = document.querySelectorAll(".pagina");

links.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();

        const pagina = link.dataset.pagina;

        // remove todas
        paginas.forEach(p => p.classList.remove("ativa"));

        // ativa a clicada
        document.getElementById(pagina).classList.add("ativa");
    });
});


//preview

const inputImg = document.getElementById("imagem");
const preview = document.getElementById("preview");
const texto = document.getElementById("texto-upload");

inputImg.addEventListener("change", function () {
    const file = inputImg.files[0];

    if (file) {
        const url = URL.createObjectURL(file);

        // mostra preview
        preview.style.backgroundImage = `url('${url}')`;
        preview.style.display = "block";

        // muda texto
        texto.textContent = "Imagem selecionada ✔";
    }
});