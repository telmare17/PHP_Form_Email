<?php require("script.php"); ?>
<?php 

   // Verifica se o formulário foi submetido.
   if(isset($_POST['submit'])){
      // Verifica se algum dos campos 'email', 'subject' ou 'message' está vazio.
      if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])){
         // Se algum campo estiver vazio, exibe uma mensagem de erro.
         $response = "Preencha todos os campos!";
      }else{
         // Se todos os campos estiverem preenchidos, chama a função sendMail e envia o e-mail.
         $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de E-mail</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <label for="email">Insira o destinatário do e-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
            
            <label for="title">Insira o título do e-mail:</label>
            <input type="text" id="title" name="subject" placeholder="Digite o título" required>
            
            <label for="subject">Insira o assunto do e-mail:</label>
            <textarea id="subject" name="message" placeholder="Digite o assunto" required></textarea>
            
            <button type="submit" name="submit">Enviar</button>

   <?php
      if(@$response == "success"){
         ?>
            <p class="success">E-mail enviado com sucesso</p>
         <?php
      }else{
         ?>
            <p class="error"><?php echo @$response; ?></p>
         <?php
      }
   ?>
        </form>
    </div>
</body>
</html>
