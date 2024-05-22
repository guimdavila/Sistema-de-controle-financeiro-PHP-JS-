<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Fonte
    ´p-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!--Font - icons -->
    <script src="https://kit.fontawesome.com/363bffc621.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dist/css/bootstrap.css">

    <style type="text/css" href="index.css">
        <?php include('dist/css/styles.css');   ?>
    </style> 


    <link rel="icon" href="dist/img/logominin.png" type="image/png">
    <title>Nordic System</title>

</head>

<body>

    <!--Barra de Navegação -->
    <header>
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg fixed-top"><!--Mantem a barra de navegação no topo da página-->
                <a href="http://localhost/Nordic%20Finance/" class="navbar-brand">
                    <img id="logo" src="dist/img/nordic.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
                    aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">

                    <div class="navbar-nav">

                        <a class="nav-item nav-link" id="inicia-sessao" href="./app"><b>Iniciar Sessão</b></a>

                      </div>
                </div>
            </nav>
        </div>
    </header>
    <!--Barra de Navegação -->

    <main>
        <div class="container-fluid">
            <!--Quando for criar um container que ocupe a tela por inteiro, lateralmente falando, utilize o container-fluid-->
            <div id="mainSlider" class="carousel slide" data-rider="carousel">

                <!--"Fotos e classes de transição da foto -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="dist/img/Design sem nome (3).png" class="d-block w-100"
                            alt="Projetos de e-commerce"><!--1 w-100 classe do boostrap para deixar largura = 100%  -->
                        <!-- alt nesse caso utilizado para acessibilidade  -->
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Quer ter o controle da suas finanças?</h2>
                            <p>Conte Conosco, Nosso Sistema Oferece uma Solução Completa e Intuitiva.</p>
                        </div>
                    </div>
                </div>

            </div>
            <!--"GRID  Sobre -->
            <div id="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12"> <!--"Linha de 12 colunas -->
                            <h3 class="main-title">Sobre a Nordic System</h3>
                        </div>
                        <div class="col-md-6"> <!--"Faz a imagem se adaptar ao tamanho da tela -->
                            <img class="img-fluid" src="dist/img/foto empresa.webp">
                        </div>
                        <div class="col-md-6">
                            <h3 class="about-title">Pensando no futuro</h3>
                            <p>
                                A Nordic é uma empresa inovadora de tecnologia especializada no desenvolvimento de
                                soluções de software para ajudar indivíduos a gerenciar suas finanças pessoais.</p>
                            <p> Com nosso software, os usuários podem acompanhar suas receitas, despesas e
                                investimentos, receber insights personalizados e muito mais.</p>
                            <p>Priorizamos a segurança e a privacidade dos dados dos nossos clientes, garantindo que
                                eles possam confiar em nossa plataforma para ajudá-los a alcançar uma saúde financeira
                                sólida.</p>
                            <p>Veja outros diferenciais: </p>
                            <ul id="about-list">
                                <li><i class="fas fa-check"></i>Interface Intuitiva e Amigável</li>
                                <!--"class="fas fa-check" no I responsável pelo check -->
                                <li><i class="fas fa-check"></i>Personalização </li>
                                <li><i class="fas fa-check"></i>Análise e Relatórios</li>
                                <li><i class="fas fa-check"></i>Suporte ao Cliente</li>
                                <li><i class="fas fa-check"></i>Inovação Contínua</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRID - Sobre -->

            <!-- Serviços da empresa -->
            <div id="services-area">
                <div class="containerSobre">
                    <div class="row">
                        <div class="col-12"> <!--"Linha de 12 colunas -->
                            <h3 class="main-title">Nossas especialidades</h3>
                        </div>
                        <div class="col-md-4 service-box">
                            <i class="fas fa-mobile-alt"></i>
                            <h4>Aplicação Mobile</h4>
                            <p>Disponibilizamos serviço mobile para controle do usuário</p>
                        </div>
                        <div class="col-md-4 service-box">
                            <i class="fas fa-hands-helping"></i>
                            <h4>Suporte 24/7</h4>
                            <p>Sempre haverá alguem da equipe disponivel para suporte em diferentes plataformas.</p>
                        </div>
                        <div class="col-md-4 service-box">
                            <i class="fas fa-paint-brush"></i>
                            <h4>Customização</h4>
                            <p>Sistema possui funcionalidade de customização</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Serviços da empresa -->
        </div>
    </main>
    <!-- Rodapé -->
    <footer>
        <div id="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="main-title">Entre em contato conosco</h3>
                    </div>
                    <div class="col-md-4 contact-box">
                        <i class="fas fa-phone"></i>
                        <p><span class="contact-tile">Ligue para:</span> (47) 99603-7235</p>
                        <p><span class="contact-tile">Horários:</span> 8:00 - 19:00</p>
                    </div>
                    <div class="col-md-4 contact-box">
                        <i class="fas fa-envelope"></i>
                        <p><span class="contact-tile">Envie um email:</span> contato@nordicsystem.com.br</p>
                    </div>
                    <div class="col-md-4 contact-box">
                        <i class="fas fa-map-marker-alt"></i>
                        <p><span class="contact-tile">Endereço:</span> Rua Blumenau - 1314</p>
                    </div>
                    <div class="col-md-6" id="msg-box">
                        <p>Ou nos deixe uma mensagem:</p>
                    </div>
                    <div class="col-md-6" id="contact-form">
                        <form action="">
                            <input type="text" class="form-control" placeholder="E-mail" name="email">
                            <input type="text" class="form-control" placeholder="Assunto" name="subject">
                            <textarea class="form-control" rows="3" placeholder="Sua mensagem..."
                                name="message"></textarea>
                            <input type="submit" class="main-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="dist/js/jQuery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</body>

</html>