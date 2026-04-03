let input = document.getElementById("search");
let campo = document.getElementById('catalagoProdutos');

var produtos = []

fetch('/dani-personalizados/admin/php/listar_produtos.php')
    .then(res => res.json())
    .then(data => {
        produtos = data;
        renderProdutos(produtos);
    })
    .catch(err => console.error("Erro:", err));


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// função que desenha os produtos
function renderProdutos(lista) {
    campo.innerHTML = "";

    for (let i = 0; i < lista.length; i++) {
        let produto = lista[i];

        campo.innerHTML += `
            <div class="produto">
                <div class="img" style="background-image:url('/dani-personalizados/${produto.img}');"></div>
                <div class="descricao">
                    <span>${produto.categoria}</span>
                    <h4>${produto.nome}</h4>
                    <a href="https://wa.me/5562986199625" target="_blank">Personalizar</a>
                </div>
            </div>
        `;
    }
}

input.addEventListener("input", () => {
    let valor = input.value.toLowerCase();

    let filtrados = produtos.filter(produto => 
        produto.nome.toLowerCase().includes(valor)
    );

    renderProdutos(filtrados);
});





// render inicial
renderProdutos(produtos);

let categorias = document.querySelectorAll("nav a");

categorias.forEach(link => {
    link.addEventListener("click", (e) => {
        if (link.dataset.categoria) {
            e.preventDefault();
        }

        // remove active de todos
        categorias.forEach(l => l.classList.remove("active"));

        // adiciona no clicado
        link.classList.add("active");

        let categoria = link.getAttribute("data-categoria");

        filtrarCategoria(categoria);
    });
});

function filtrarCategoria(categoria) {

    if (categoria === "todos") {
        renderProdutos(produtos);
        return;
    }

    let filtrados = produtos.filter(produto => 
        produto.categoria === categoria
    );

    renderProdutos(filtrados);
}