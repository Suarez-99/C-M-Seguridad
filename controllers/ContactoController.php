<?php
class ContactoController {
    public function enviarMensaje() {
        if (
            isset($_POST['nombre']) && !empty($_POST['nombre']) &&
            isset($_POST['telefono']) && !empty($_POST['telefono']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['mensaje']) && !empty($_POST['mensaje'])
        ) {
            $nombre = htmlspecialchars($_POST['nombre']);
            $telefono = htmlspecialchars($_POST['telefono']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $mensaje = htmlspecialchars($_POST['mensaje']);

            $to = 'contacto@cymseguridad.com.ar'; // Cambia esto por tu email real
            $subject = 'Nuevo mensaje de contacto desde la web';
            $body = "Nombre: $nombre\nTeléfono: $telefono\nEmail: $email\nMensaje: $mensaje";
            $headers = "From: $email\r\nReply-To: $email\r\n";

            // Intenta enviar el correo
            if (mail($to, $subject, $body, $headers)) {
                $_POST['mensaje_enviado'] = true;
            } else {
                $_POST['mensaje_enviado'] = false;
            }
        } else {
            $_POST['mensaje_enviado'] = false;
        }
    }
}
?>
