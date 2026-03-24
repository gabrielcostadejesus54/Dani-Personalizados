let campo = document.getElementById('catalagoProdutos');

var produtos = [
{
    'img': 'caneca-teste.jpg',
    'categoria': 'Bebidas',
    'nome': 'Caneca Personalizada',
},
{
    'img': 'bebida-chopp.jpg',
    'categoria': 'Bebidas',
    'nome': 'Caneca de Chopp'
}
];


for (let i = 0; i < produtos.length; i++) {
    let produto = produtos[i];

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
        