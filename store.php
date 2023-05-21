<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <link rel="manifest" href="manifest.json">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <title>Dul N'Nouk White</title>
  <meta name="description" content="Os Dul and Nouk White são uma banda de rock alternativo madeirense com um repertório constituído, maioritariamente, por temas originais que visitam géneros musicais bastante distintos como o rock, o fado, o blues, o pop, o jazz e a música do mundo.">
  <meta name="keywords" content="dul organic orgânico music madeira rock pop portugal">
  <meta name="author" content="dul and nouk white">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css"/>
  <link rel="stylesheet" href="css/store.css"/>
  <link rel="icon" type="image/jpg" href="img/favicon.jpg" />
  <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css"/>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-RGNG966SBS"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RGNG966SBS');
  </script>
</head>
<body>
<main>
  <header>
    <h1>Dul and Nouk White</h1>
	<h2>Orgânico 2023</h2>
  </header>
  <article>

        <p>A arte visual da capa do álbum de Dul and Nouk White, foi desenhada pelo artista Sílvio Pita, e aborda, ao pormenor, todo o plano tridimensional da existência onde se incluem os cinco organismos intérpretes que formam o núcleo do projeto. O processo de Vida é aqui representado como um ciclo infinito, onde o Cosmos é lugar de início e de fim, fundindo deste modo a zona neural do interior da terra, onde se encontram os micélios, as raízes e as sementes, com o expandido Universo, de onde vimos e para onde retornaremos, lugar onde se encontram todos os componentes-base para o desenvolvimento da Vida na Terra.</p>

        <p>A árvore aqui é representada como o ser vivo que atravessa os três planos da existência, e que contribui, ativamente, na decomposição e na concepção do conceito que temos de Vida, levando-a dispersa na ponta dos seus galhos em direção aos céus, catapultando-nos, novamente, para o fim que é, também um início.</p>

      <section>
          <figure>
              <img src="/img/Frente_fundo_azul.jpg" alt="Trulli" style="width:100%">
              <figcaption>Frente</figcaption>
          </figure>
          <figure>
              <img src="/img/Tshirt_verso.jpg" alt="Trulli" style="width:100%">
              <figcaption>Verso</figcaption>
          </figure>
      </section>
  </article>
    <article>
        <form>
            <div class="form-group mb-3">
                <label for="size">Escolha o tamanho</label>
                <select class="form-control" id="size" name="size" required>
                    <option value disabled selected>Clique para mostrar a lista de opções</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="form-group mb-5">
                <label for="qtd">Escolha uma quantidade</label>
                <input type="number" class="form-control" id="qtd" name="qtd"  placeholder="1" value="1" min="1" required>
            </div>
            <div class="form-group mb-3">
                <input class="btn btn-primary" type="submit" value="Adicionar ao carrinho" />
            </div>
        </form>
    </article>
  <footer>

  </footer>
</main>
<div>
    <i class="fa-solid fa-cart-shopping"></i>
</div>
<script src="js/store.js"></script>
<script src="node_modules/accounting/accounting.min.js"></script>
<script src="node_modules/store2/dist/store2.min.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
<script src="node_modules/mustache/mustache.min.js"></script>
<script src="node_modules/@jvitela/mustache-wax/dist/mustache-wax.min.js"></script>
</body>
</html>