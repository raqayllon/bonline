<?php
$phone = get_theme_mod('bonline_phone', '34600000000');
$email = get_theme_mod('bonline_email', 'hola@bonline.es');
?>

<hr class="gl">

<footer>
  <div class="ftg">
    <div>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo ft-logo" aria-label="b online">
        <div class="logo-s"><div class="logo-st"></div><div class="logo-bw"></div><div class="logo-dt"></div></div>
        <div class="logo-tx"><span class="logo-bb">b</span> <span class="logo-on">online</span></div>
      </a>
      <p class="ft-d">Agencia digital. Diseñamos webs profesionales que hacen crecer tu negocio. Madrid · Barcelona.</p>
    </div>
    <div class="ftc">
      <h5>Servicios</h5>
      <a href="#servicios">Web corporativa</a>
      <a href="#servicios">Tienda online</a>
      <a href="#servicios">Posicionamiento</a>
      <a href="#servicios">IA y automatización</a>
    </div>
    <div class="ftc">
      <h5>Empresa</h5>
      <a href="#equipo">Equipo</a>
      <a href="#proyectos">Proyectos</a>
      <a href="#precios">Precios</a>
    </div>
    <div class="ftc">
      <h5>Contacto</h5>
      <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
      <a href="https://wa.me/<?php echo esc_attr($phone); ?>">WhatsApp</a>
      <a href="mailto:<?php echo esc_attr($email); ?>?subject=Videollamada">Videollamada 15 min</a>
    </div>
  </div>
  <div class="ftb">
    <span>© <?php echo date('Y'); ?> b online — be digital — be online</span>
    <div class="ftl">
      <a href="<?php echo esc_url(get_privacy_policy_url() ?: '#'); ?>">Privacidad</a>
      <a href="#">Aviso legal</a>
      <a href="#">Cookies</a>
    </div>
  </div>
</footer>

<!-- ─── Chatbot Widget ─── -->
<div id="chatbot" aria-label="Asistente de b online" role="complementary">
  <button id="chatBtn" class="chat-btn" aria-label="Abrir chat" aria-expanded="false">
    <svg class="chat-icon-open" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
    <svg class="chat-icon-close" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
    <span class="chat-badge" id="chatBadge">1</span>
  </button>

  <div class="chat-window" id="chatWindow" aria-hidden="true">
    <div class="chat-head">
      <div class="chat-av">
        <div class="logo-s sm"><div class="logo-st"></div><div class="logo-bw"></div><div class="logo-dt"></div></div>
      </div>
      <div>
        <div class="chat-name">b online</div>
        <div class="chat-status"><span class="chat-dot"></span> En línea</div>
      </div>
      <button class="chat-x" id="chatClose" aria-label="Cerrar chat">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
      </button>
    </div>
    <div class="chat-msgs" id="chatMsgs" role="log" aria-live="polite"></div>
    <div class="chat-inp">
      <input type="text" id="chatInput" placeholder="Escribe tu pregunta..." autocomplete="off" maxlength="300">
      <button id="chatSend" aria-label="Enviar">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2L15 22l-4-9-9-4 20-7z"/></svg>
      </button>
    </div>
    <div class="chat-foot">
      <a href="https://wa.me/<?php echo esc_attr($phone); ?>" target="_blank" rel="noopener">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.137.561 4.14 1.538 5.873L.057 23.428a.5.5 0 00.611.61l5.598-1.467A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.907 0-3.694-.5-5.24-1.374l-.374-.22-3.87 1.015 1.035-3.775-.24-.39A9.956 9.956 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
        ¿Prefieres WhatsApp?
      </a>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
