let input = document.getElementById("search");
let campo = document.getElementById('catalagoProdutos');

var produtos = [
{
    img: 'caneca-teste.jpg',
    categoria: 'Bebidas',
    nome: 'Caneca Personalizada',
},
{
    img: 'bebida-chopp.jpg',
    categoria: 'Bebidas',
    nome: 'Caneca de Chopp'
},
{
    img: 'body-bebe.jpg',
    categoria: 'Vestuário',
    nome: 'Body para Bebês'
},
{
    img: 'camiseta-personalizada.jpg',
    categoria: 'Vestuário',
    nome: 'Camiseta Personalizada'
},
{
    img: 'caneta-personalizada.jpg',
    categoria: 'Têxtil & Acessórios',
    nome: 'Caneta Personalizada'
},
{
    img: 'chaveiro.jpg',
    categoria: 'Têxtil & Acessórios',
    nome: 'Chaveiro Personalizado'
},
{
    img: 'chinelo-personalizado.jpg',
    categoria: 'Vestuário',
    nome: 'Chinelo Personalizado'
},
{
    img: 'cofre-papelao.jpg',
    categoria: 'Decoração',
    nome: 'Cofre de Papelão'
},
{
    img: 'copo-long-drink.jpg',
    categoria: 'Bebidas',
    nome: 'Copo Long Drink'
},
{
    img: 'copo-twister.jpg',
    categoria: 'Bebidas',
    nome: 'Copo Twister'
},
{
    img:'garrafa-personalizada.jpg',
    categoria: 'Bebidas',
    nome: 'Garrafa Personalizada'
},
{
    img: 'ima-geladeira.jpg',
    categoria: 'Decoração',
    nome: 'Ímã de Geladeira'
},
{
    img: 'necessaire.jpg',
    categoria: 'Têxtil & Acessórios',
    nome: 'Necessaire Personalizado'
},
{
    img: 'plaquinha-mdf.jpg',
    categoria: 'Decoração',
    nome: 'Plaquinha de MDF'
},
{
    img: 'porta-retrato-azulejo.jpg',
    categoria: 'Decoração',
    nome: 'Porta-Retrato de Azulejo'
},
{
    img: 'quebra-cabeça.jpg',
    categoria: 'Decoração',
    nome: 'Quebra-Cabeça Personalizado'
},
{
    img: 'squeeze.jpg',
    categoria: 'Bebidas',
    nome: 'Squeeze Personalizado'
},
{
    img: 'toalha-corpo.jpg',
    categoria: 'Têxtil & Acessórios',
    nome: 'Toalha de Corpo Personalizada'
},
{
    img: 'toalha-lavabo.jpg',
    categoria: 'Têxtil & Acessórios',
    nome: 'Toalha de Lavabo Personalizada'
}

]




















//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// função que desenha os produtos
function renderProdutos(lista) {
    campo.innerHTML = "";

    for (let i = 0; i < lista.length; i++) {
        let produto = lista[i];

        campo.innerHTML += `
            <div class="produto">
                <div class="img" style="background-image: url('img/${produto.img}');"></div>
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