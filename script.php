<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'config.php';

/**
 * The function uses the PHPMailer object to send an email
 * to the address we specify.
 * @param string $email The recipient's email address.
 * @param string $subject The subject of the email.
 * @param string $message The body of the email.
 * @return string Error message or success.
 */
function sendMail($email, $subject, $message){
    // Criando um novo objeto PHPMailer.
    $mail = new PHPMailer(true);
  
    // Para ver o processo de envio de e-mail, descomente a linha abaixo.
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  
    // Usando o protocolo SMTP para enviar o e-mail.
    $mail->isSMTP();
  
    // Definindo SMTPAuth como verdadeiro, para podermos usar nossas credenciais de login.
    $mail->SMTPAuth = true;
  
    // Definindo o servidor SMTP, configurado no arquivo config.php.
    $mail->Host = MAILHOST;
  
    // Definindo o nome de usuário para o servidor SMTP, também configurado no arquivo config.php.
    $mail->Username = USERNAME;
  
    // Definindo a senha para o servidor SMTP, configurada no arquivo config.php.
    $mail->Password = PASSWORD;
     
    // Usando criptografia STARTTLS para garantir uma comunicação segura.
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  
    // Definindo a porta TCP para conectar ao servidor SMTP do Gmail.
    $mail->Port = 587;
  
    // Definindo o remetente do e-mail, usando as constantes definidas no arquivo config.php.
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
  
    // Definindo o destinatário do e-mail, baseado no e-mail passado para a função.
    $mail->addAddress($email);
  
    // Definindo o e-mail para onde as respostas devem ser enviadas, também configurado no arquivo config.php.
    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
  
    // Definindo que o e-mail será enviado com formatação HTML.
    $mail->IsHTML(true);
  
    // Definindo o assunto do e-mail.
    $mail->Subject = $subject;
  
    // Definindo o corpo do e-mail.
    $mail->Body = $message;
  
    // Fornecendo uma alternativa em texto simples para clientes de e-mail que não suportam HTML.
    $mail->AltBody = $message;
    
    // Enviando o e-mail. Se ocorrer um erro, retornará uma mensagem de falha.
    // Se for bem-sucedido, retornará uma mensagem de sucesso.
    if(!$mail->send()){
       return "E-mail não enviado. Tente novamente.";
    }else{
       return "Erro (nenhum campo preenchido)!";
    }
}
