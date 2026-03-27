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


