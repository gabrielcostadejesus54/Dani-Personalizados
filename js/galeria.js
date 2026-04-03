const campo = document.querySelector(".area-fotos");

fetch('/dani-personalizados/admin/php/listar_galeria.php')
    .then(res => res.json())
    .then(data => {
        campo.innerHTML = "";

        data.forEach(item => {
            campo.innerHTML += `
                <div class="img" style="background-image: url('/dani-personalizados/${item.img}');"></div>
            `;
        });
    })
    .catch(err => console.error("Erro:", err));