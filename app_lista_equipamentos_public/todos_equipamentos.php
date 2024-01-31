<?php

$acao = 'recuperar';
require 'equipamento_controller.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Lato:wght@900&family=Montserrat+Alternates:ital,wght@1,300&family=Playfair+Display&family=Roboto+Mono:wght@500&family=Roboto+Serif:opsz,wght@8..144,100&family=Roboto:wght@100;300;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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


<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
    <div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Equipamento inserido com sucesso</h5>
		</div>
<?php } ?> 

<section class="todos-equipamentos">
    <div class="tabela">
        <h2 style="text-align: center;">Every Loans</h2>

        <table class="table table-hover">
            <thead >
                <tr>
                    <th>Euipament</th>
                    <th>Calibration code:</th>
                    <th>Department:</th>
                    <th>Date of withdrawal:</th>
                    <th>Return date:</th>
                    <th>Responsible for release:</th>
                    <th>E-mail reponsible:</th>
                    <th>Responsible return:</th>
                    <th>E-mail responsibel return:</th>
                    <th>Status:</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                  <?php foreach ($equipamentos as $indice => $equip) {
                      $data_hoje = date('Y/m/d');
                      $vencimento = $equip->data_devolucao;

                      $data_timestamp1 = new DateTime($data_hoje);
                      $data_timestamp2 = new DateTime($vencimento);

                      if ($data_timestamp1 > $data_timestamp2) {
                          $color = 'table-danger';
                      } else {
                          $color = 'table-info';
                      }

                      ?>
                <tr class="<?php echo $color; ?>">
              
                    
            
                    <td id="equipamento_<?php echo $equip->id; ?>" ondblclick="myFunction(<?php echo $equip->id; ?>, '<?php echo $equip->equipamento; ?>')">
                    <?php echo $equip->equipamento; ?>
                </td>
                    
                <td id="cod_<?php echo $equip->id; ?>" ondblclick="myFunction2(<?php echo $equip->id; ?>, '<?php echo $equip->cod_calibracao; ?>')">
                    <?php echo $equip->cod_calibracao; ?>
                </td>
                    
                    
                    <td><?php echo $equip->departamento; ?>
                </td>
                   
                <td>
                        <?php

                         $data_br1 = $equip->data_retirada;

                      $data1 = date('d/m/Y', strtotime($data_br1));

                      echo $data1;

                      ?>
                    
                    </td>
                   
                    <td>
                        <?php

                         $data_br2 = $equip->data_devolucao;

                      $data2 = date('d/m/Y', strtotime($data_br2));

                      echo $data2;

                      ?>
                    
                    </td>
                    
                    
                    <td ><?php echo $equip->responsavel_liberacao; ?></td>
                    <td><?php echo $equip->email_responsavel; ?></td>
                    <td><?php echo $equip->responsavel_devolucao; ?></td>
                    <td><?php echo $equip->email_destinado; ?></td>
                    <td><?php echo $equip->status_equipamento; ?></td>
                    <td class="acoes">
                     <i title="Return" class="fa-solid fa-pen-to-square i-1" onclick="devolvido(<?php echo $equip->id; ?>)"></i>
                     <i  title="Delete" class="fa-solid fa-trash i-2" onclick="remover(<?php echo $equip->id; ?>)"></i>
                    </td>
                </tr>
                <?php } ?>
           
            </tbody>
        </table>
    </div>
</section><!--todos-equipamentos-->


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $('nav.mobile h3').click(function(){
        $('nav.mobile').find('ul').slideToggle();
    });

    function myFunction(id, txt_equipamento)
    {
				//Criar um form de edição

				let form = document.createElement('form');
				
				form.action = 'todos_equipamentos.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//criar um input para entrada do texto

				let inputEquipamento = document.createElement('input');

				inputEquipamento.type = 'text';
				inputEquipamento.name = 'equipamento';
				inputEquipamento.className = 'col-9 form-control';
				inputEquipamento.value = txt_equipamento;

				//criar um input hidden para guardar o id da tarefa

				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;

                

				//criar um button para envio do form

				let button = document.createElement('button');

				button.type = 'submit';
				button.className = 'col-9 btn btn-info';
				button.innerHTML = 'Atualizar';

				//incluir o inputTarefa no form

				form.appendChild(inputEquipamento);

                

				//incluir o inputId no form

				form.appendChild(inputId);

				//incluir button no form

				form.appendChild(button);

				//teste

				//Selecionar a div tarefa

				let equipamento = document.getElementById('equipamento_'+id);

                
				//limpar o texto da tarefa para inclusão do form

				equipamento.innerHTML = '';

                

				//incluir form na pagina

				equipamento.insertBefore(form, equipamento[0]);


			}

            function remover(id)
			{
				location.href = 'todos_equipamentos.php?acao=remover&id='+id;
		    }

            function devolvido(id)
			{
				location.href = 'todos_equipamentos.php?acao=marcarDevolvido&id='+id;
			}

        

</script>

        
</body>
</html>