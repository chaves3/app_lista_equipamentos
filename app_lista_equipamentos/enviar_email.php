<?php 

require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
require_once('phpmailer/src/Exception.php');

use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\SMTP;
use phpmailer\PHPMailer\Exception;


class Mensagem
{

    private $id;

    private $equipamento;

    private $cod_calibracao;

    private $departamento;

    private $data_retirada;

    private $data_devolucao;

    private $responsavel_liberacao;

    private $email_responsavel;

    private $responsavel_devolucao;

    private $email_destinado;

    private $status_equipamento;


    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
        
}      
     
$mensagem = new Mensagem();


$mensagem->__set("equipamento", $_POST['equipament']);

$mensagem->__set("cod_calibracao", $_POST['calibration-code']);

$mensagem->__set("departamento", $_POST['department']);

$mensagem->__set("data_retirada", $_POST['date-of-withdrawal']);

$mensagem->__set("data_devolucao", $_POST['return-date']);

$mensagem->__set("responsavel_liberacao", $_POST['responsible-for-release']);

$mensagem->__set("email_responsavel", $_POST['email-reponsible']);

$mensagem->__set("responsavel_devolucao", $_POST['responsible-return']);

$mensagem->__set("email_destinado", $_POST['email-responsibel-return']);

$mensagem->__set("status_equipamento", $_POST['status']);




$mail = new PHPMailer(true);


try {
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host = gethostbyname('smtp.gmail.com');
    $mail->SMTPSecure = "tls";
    //echo 'SMTP secure...<br/>';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";
    $mail->setFrom('');
    $mail->addAddress($mensagem->__get('email_responsavel'));
    $mail->addAddress($mensagem->__get('email_destinado'));
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    $mail->isHTML(true);
    $mail->Subject = "Emprestimo equipamento do Laboratorio";
    $mail->Body = "
    
    Equipamento =" .$mensagem->__get('equipamento'). "<br>
    Equipamento =" .$mensagem->__get('cod_calibracao'). "<br>
    Equipamento =" .$mensagem->__get('departamento'). "<br>
    Equipamento =" .$mensagem->__get('data_retirada'). "<br>
    Equipamento =" .$mensagem->__get('data_devolucao'). "<br>
    Equipamento =" .$mensagem->__get('responsavel_liberacao'). "<br>
    Equipamento =" .$mensagem->__get('email_responsavel'). "<br>
    Equipamento =" .$mensagem->__get('responsavel_devolucao'). "<br>
    Equipamento =" .$mensagem->__get('email_destinado'). "<br>
    Equipamento =" .$mensagem->__get('status_equipamento'). "<br>
    
    ";
        
    $mail->AltBody = "teste_email";
    
//  echo 'SMTP send...<br/>';
    if($mail->send()) {
        print("ok");
    } else {
        print("hi");
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}


 ?>