<?php
defined('ABSPATH') || exit;

function bonline_handle_contact() {
    // Verify nonce
    if (!check_ajax_referer('bonline_contact_nonce', 'nonce', false)) {
        wp_send_json_error(['message' => 'Solicitud no válida. Por favor, recarga la página e inténtalo de nuevo.']);
    }

    // Sanitize inputs
    $nombre   = sanitize_text_field($_POST['nombre']   ?? '');
    $email    = sanitize_email($_POST['email']         ?? '');
    $telefono = sanitize_text_field($_POST['telefono'] ?? '');
    $servicio = sanitize_text_field($_POST['servicio'] ?? '');
    $mensaje  = sanitize_textarea_field($_POST['mensaje'] ?? '');

    // Validate required
    if (empty($nombre) || empty($email)) {
        wp_send_json_error(['message' => 'Por favor, rellena tu nombre y email.']);
    }
    if (!is_email($email)) {
        wp_send_json_error(['message' => 'El email no parece válido. Revísalo y vuelve a intentarlo.']);
    }

    $to      = get_theme_mod('bonline_email_to', 'hola@bonline.es');
    $subject = '[b online] Nuevo mensaje de ' . $nombre;

    $body  = "Has recibido un nuevo mensaje desde el formulario de bonline.es\n\n";
    $body .= "─────────────────────────────\n";
    $body .= "Nombre:   {$nombre}\n";
    $body .= "Email:    {$email}\n";
    if ($telefono) $body .= "Teléfono: {$telefono}\n";
    if ($servicio) $body .= "Servicio: {$servicio}\n";
    $body .= "─────────────────────────────\n\n";
    if ($mensaje) $body .= "Mensaje:\n{$mensaje}\n\n";
    $body .= "─────────────────────────────\n";
    $body .= "Enviado desde: " . home_url() . "\n";
    $body .= "IP: " . sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '') . "\n";
    $body .= "Fecha: " . current_time('d/m/Y H:i') . "\n";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nombre . ' <' . $email . '>',
    ];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        // Auto-reply to the user
        $reply_subject = 'Hemos recibido tu mensaje — b online';
        $reply_body    = "Hola {$nombre},\n\n";
        $reply_body   .= "Muchas gracias por escribirnos. Hemos recibido tu mensaje y te responderemos en menos de 24 horas.\n\n";
        $reply_body   .= "Mientras tanto, si necesitas algo urgente puedes escribirnos por WhatsApp o llamarnos directamente.\n\n";
        $reply_body   .= "Un saludo,\nEl equipo de b online\nhola@bonline.es\nhttps://bonline.es\n";

        $reply_headers = [
            'Content-Type: text/plain; charset=UTF-8',
            'From: b online <' . get_theme_mod('bonline_email', 'hola@bonline.es') . '>',
        ];
        wp_mail($email, $reply_subject, $reply_body, $reply_headers);

        wp_send_json_success(['message' => '¡Mensaje enviado! Te responderemos en menos de 24 horas.']);
    } else {
        wp_send_json_error(['message' => 'Algo ha ido mal al enviar el mensaje. Por favor, escríbenos directamente a hola@bonline.es']);
    }
}

add_action('wp_ajax_bonline_contact',        'bonline_handle_contact');
add_action('wp_ajax_nopriv_bonline_contact', 'bonline_handle_contact');
