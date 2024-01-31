<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Lato:wght@900&family=Montserrat+Alternates:ital,wght@1,300&family=Playfair+Display&family=Roboto+Mono:wght@500&family=Roboto+Serif:opsz,wght@8..144,100&family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de empréstimo</title>
</head>
<body>
<header>
    <div class="center">
    <div class="logo">
        <img src="imagens/logo.png" alt="">
    </div><!--logo-->
    
    <nav class="desktop">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="todos_equipamentos.php">Every Loans</a></li>
            <li class="btn-nav">Fazer um empréstimo</li>
        </ul>
    </nav><!--desktop-->

    <nav class="mobile">
        <h3><i class="fa fa-bars"></i></h3>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="todos_equipamentos.php">Every Loans</a></li>
            <li class="btn-nav">Fazer um empréstimo</li>
        </ul>
    </nav><!--mobile-->

    <div class="clear"></div>
    </div><!--center-->

</header>


<section class="formulario">
    <div class="center">
        <div class="form-center">
            <div class="titulo-formulario">
                <h2>Loan Now :</h2>
            </div><!--titulo-formulario-->
        <form method="post" action="equipamento_controller.php?acao=inserir">
            <div class="form-control">
                <span for="equipament"> Equipament:</span>
                <input type="text" id="equipament" name="equipament">
            </div><!--form-control-->

            <div class="form-control">
                <span for="calibration-code"> Calibration code:</span>
                <input type="text" id="calibration-code" name="calibration-code">
            </div><!--form-control-->

            <div class="form-control">
                <span for="department"> Department:</span>
                <input type="text" id="department" name="department">
            </div><!--form-control-->

            <div class="form-control">
                <span for="date-of-withdrawal"> Date of withdrawal:</span>
                <input type="date" id="date-of-withdrawal" name="date-of-withdrawal">
            </div><!--form-control-->
            
            <div class="form-control">
                <span for="return-date"> Return date:</span>
                <input type="date" id="return-date" name="return-date">
            </div><!--form-control-->


            <div class="form-control">
                <span for="responsible-for-release"> Responsible for release:</span>
                <input type="text" id="responsible-for-release" name="responsible-for-release">
            </div><!--form-control-->

            <div class="form-control">
                <span for="email-reponsible"> E-mail reponsible:</span>
                <input type="email" id="email-reponsible" name="email-reponsible">
            </div><!--form-control-->

            <div class="form-control">
                <span for="responsible-return">Responsible return:</span>
                <input type="text" id="responsible-return" name="responsible-return">
            </div><!--form-control-->

            <div class="form-control">
                <span for="email-responsibel-return"> E-mail responsibel return:</span>
                <input type="email" id="email-responsibel-return" name="email-responsibel-return">
            </div><!--form-control-->


            <div class="form-control">
                <span for="status"> Status:</span>
                <select name="status" id="status">
                    <option value="loaned">Loaned</option>
                    <option value="returning">Returning</option>
                </select>
            </div><!--form-control-->
            
            <div class="form-control">
                <button type="submit">Send</button>
            </div>
        </form>
        </div><!--form-center-->
    </div><!--center-->
</section><!--formulario-->


<footer>
    <div class="primeira-parte-final">
        <div class="center">
        <h3>Developer :</h3>
        
        <p>Matheus chaves da silva</p>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a href="#"><i class="fa-brands fa-github"></i></a>
    </div><!--primeira-parte-final-->
    <div class="clear"></div>
  
    </div><!--center-->
    <div class="segunda-parte-final">
        <form action="">
        <h3>You have questions ?</h3>
        <textarea name="question" id="question"></textarea>
        <br>
        <input type="submit" value="Send">
        </form>
    </div><!--segunda-parte-final-->

    <div class="clear"></div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $('nav.mobile h3').click(function(){
        $('nav.mobile').find('ul').slideToggle();
    });
</script>
</body>
</html>