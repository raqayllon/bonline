<?php
defined('ABSPATH') || exit;
$phone = get_theme_mod('bonline_phone', '34600000000');
$email = get_theme_mod('bonline_email', 'hola@bonline.es');
get_header();
?>

<!-- ─── HERO ─── -->
<section class="hero">
  <div class="hero-c">
    <div class="h-tag rv"><span class="dot"></span> Aceptando nuevos proyectos</div>
    <h1 class="rv d1">Lleva tu negocio al <span class="ac">siguiente nivel</span></h1>
    <p class="hero-sub rv d2">Somos tu agencia digital. Diseñamos y desarrollamos webs profesionales que transmiten confianza, captan clientes y hacen crecer tu marca.</p>
    <div class="hero-a rv d3">
      <a href="#contacto" class="btn-grad">Impulsa tu negocio <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
      <a href="#proyectos" class="btn-g">Ver proyectos ↓</a>
    </div>
    <div class="hero-bar rv d3">
      <a href="mailto:<?php echo esc_attr($email); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        <?php echo esc_html($email); ?>
      </a>
      <a href="https://wa.me/<?php echo esc_attr($phone); ?>" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
        WhatsApp
      </a>
      <a href="mailto:<?php echo esc_attr($email); ?>?subject=Reservar%20videollamada%2015%20min">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9.75a2.25 2.25 0 002.25-2.25v-9A2.25 2.25 0 0014.25 5.25H4.5A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/></svg>
        Videollamada 15 min
      </a>
    </div>
  </div>

  <div class="hero-v">
    <div class="hm">
      <div class="fl f1"><div class="fl-l">Visitas / mes</div><div class="fl-v up">+340%</div></div>
      <div class="fl f2"><div class="fl-l">Velocidad</div><div class="fl-v" style="color:#22c55e">98/100</div></div>
      <div class="mbr">
        <div class="mb-bar">
          <span class="md"></span><span class="md"></span><span class="md"></span>
          <span class="mu">tunegocio.es</span>
        </div>
        <div class="mb-bd">
          <div class="mbl"></div><div class="mbl"></div>
          <div class="mbs"></div><div class="mbs"></div><div class="mbs"></div>
          <div class="m-btn"></div>
          <div class="m-gr"><div class="m-cd"></div><div class="m-cd"></div><div class="m-cd"></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── MARQUEE ─── -->
<div class="marq" aria-hidden="true">
  <div class="marq-track">
    <?php for ($i = 0; $i < 12; $i++): ?>
    <span class="marq-item">be digital — be online</span>
    <?php endfor; ?>
  </div>
</div>

<!-- ─── PRECIOS ─── -->
<section class="sec" id="precios">
  <div class="pr-head rv">
    <div class="sl">Precios</div>
    <h2 class="stt">Precios transparentes</h2>
    <p class="ss" style="margin-bottom:0">Presupuesto cerrado y detallado desde el primer día.</p>
    <div class="pr-tags">
      <span class="pr-tag">Económico</span>
      <span class="pr-tag">Competitivo</span>
      <span class="pr-tag">Precio cerrado</span>
      <span class="pr-tag">Sin letra pequeña</span>
    </div>
  </div>

  <div class="pr-row">
    <div class="pr rv">
      <div class="pr-nm">Digital</div>
      <div class="pr-p">990€</div>
      <div class="pr-per">Pago único + IVA</div>
      <p class="pr-d">La web profesional que tu negocio necesita para dar una imagen sólida y captar la atención de tus clientes.</p>
      <ul class="pr-li">
        <li>Diseño personalizado y a medida</li>
        <li>Hasta 8 secciones</li>
        <li>Adaptada a móvil, tablet y escritorio</li>
        <li>Optimizada para buscadores</li>
        <li>Formulario de contacto integrado</li>
        <li>Tu web es tuya, sin dependencias</li>
      </ul>
      <a href="#contacto" class="pr-cta-o">Empezar mi proyecto</a>
    </div>

    <div class="pr pop rv d1">
      <span class="pop-t">El más elegido</span>
      <div class="pr-nm">Premium</div>
      <div class="pr-p">1.990€</div>
      <div class="pr-per">Pago único + IVA</div>
      <p class="pr-d">Para negocios que quieren ir un paso más allá: más secciones, más estrategia, más resultados.</p>
      <ul class="pr-li">
        <li>Todo lo del plan Digital</li>
        <li>Hasta 10 secciones a medida</li>
        <li>Estrategia de contenidos y posicionamiento</li>
        <li>Integración con redes sociales</li>
        <li>Google Maps y ficha de negocio</li>
        <li>Soporte post-lanzamiento incluido</li>
      </ul>
      <a href="#contacto" class="pr-cta">Empezar mi proyecto</a>
    </div>

    <div class="pr rv d2">
      <div class="pr-nm">A medida</div>
      <div class="pr-p">Tu proyecto</div>
      <div class="pr-per">Presupuesto personalizado</div>
      <p class="pr-d">Tienda online, sistema de reservas, multiidioma o cualquier funcionalidad que tu negocio necesite.</p>
      <ul class="pr-li">
        <li>Diseño 100% a medida</li>
        <li>E-commerce con pasarela de pago</li>
        <li>Reservas y área privada</li>
        <li>Conexión con CRM y herramientas</li>
        <li>Multiidioma</li>
        <li>Copywriting profesional</li>
      </ul>
      <a href="#contacto" class="pr-cta-o">Hablemos de tu proyecto</a>
    </div>
  </div>
  <p class="pr-note rv">Todos los precios + IVA. Precio cerrado desde la primera reunión. Transparencia total en cada fase del proyecto.</p>
</section>

<!-- ─── SERVICIOS ─── -->
<section class="sec sec-w" id="servicios">
  <div class="sl rv">Servicios</div>
  <h2 class="stt rv">Digitalizamos tu negocio</h2>
  <p class="ss rv">Cada servicio está pensado para resolver un problema concreto y generar resultados reales.</p>
  <div class="wg">
    <div class="wb rv">
      <div class="wb-n">01</div>
      <h3>Presencia profesional online</h3>
      <p>Webs corporativas que comunican el valor real de tu negocio. Diseño a medida pensado para generar confianza y convertir visitas en contactos.</p>
      <span class="tg">Webs corporativas · Landing pages · Rediseños</span>
    </div>
    <div class="wb rv d1">
      <div class="wb-n">02</div>
      <h3>Venta y captación online</h3>
      <p>Tiendas online funcionales, sistemas de reservas y formularios inteligentes. Todo lo necesario para que tu web genere negocio de forma activa.</p>
      <span class="tg">E-commerce · Reservas · Formularios</span>
    </div>
    <div class="wb rv d2">
      <div class="wb-n">03</div>
      <h3>Posicionamiento y visibilidad</h3>
      <p>Trabajamos para que tu web aparezca donde tus clientes buscan. Estrategia de contenidos, SEO técnico y presencia en Google optimizada.</p>
      <span class="tg">SEO · Contenidos · Google Business</span>
    </div>
    <div class="wb rv d3">
      <div class="wb-n">04</div>
      <h3>IA y automatización</h3>
      <p>Chatbots inteligentes, flujos automatizados y conexiones entre plataformas. Hacemos que la tecnología trabaje por tu negocio las 24 horas.</p>
      <span class="tg">Chatbots · CRM · WhatsApp Business · Email</span>
    </div>
  </div>
</section>

<!-- ─── PROCESO ─── -->
<section class="sec sec-bl">
  <div class="sl rv">Proceso</div>
  <h2 class="stt rv" style="color:#fff">De la idea a tu web, paso a paso</h2>
  <p class="ss rv">Un proceso claro y transparente en cada fase.</p>
  <div class="proc-r rv">
    <div class="pc">
      <div class="pc-n">01</div>
      <h4>Nos conocemos</h4>
      <p>Hablamos de tu negocio, tus objetivos y lo que necesitas. Sin compromiso.</p>
    </div>
    <div class="pc">
      <div class="pc-n">02</div>
      <h4>Diseñamos</h4>
      <p>Creamos una propuesta visual a medida. Tú validas, nosotros ajustamos hasta que encaje.</p>
    </div>
    <div class="pc">
      <div class="pc-n">03</div>
      <h4>Desarrollamos</h4>
      <p>Construimos tu web con código limpio, rápida y preparada para posicionar en Google.</p>
    </div>
    <div class="pc">
      <div class="pc-n">04</div>
      <h4>Lanzamos</h4>
      <p>Publicamos, configuramos todo lo necesario y te acompañamos en las primeras semanas.</p>
    </div>
  </div>
</section>

<!-- ─── EQUIPO ─── -->
<section class="sec" id="equipo">
  <div class="sl rv">Equipo</div>
  <h2 class="stt rv">Las personas detrás de b online</h2>
  <p class="team-txt rv">Trabajamos de forma directa, sin intermediarios. Cada persona del equipo está involucrada en los proyectos desde el primer día.</p>
  <div class="team-g rv">
    <div class="tm">
      <div class="tm-init">ST</div>
      <h4>Sergio de la Torre</h4>
      <div class="role">Director de estrategia</div>
      <div class="bio">Define la hoja de ruta de cada proyecto. Analiza el negocio, el mercado y la competencia para tomar las decisiones correctas desde el inicio.</div>
    </div>
    <div class="tm">
      <div class="tm-init">RA</div>
      <h4>Raquel Ayllón</h4>
      <div class="role">Directora de marketing</div>
      <div class="bio">Diseña la estrategia de captación y comunicación digital. Responsable de que cada web atraiga al público adecuado.</div>
    </div>
    <div class="tm">
      <div class="tm-init">JG</div>
      <h4>Jose García</h4>
      <div class="role">Lead developer</div>
      <div class="bio">Responsable del desarrollo técnico. Construye cada web con código limpio, seguro y optimizado para rendimiento y escalabilidad.</div>
    </div>
    <div class="tm">
      <div class="tm-init">LP</div>
      <h4>Laura Pérez</h4>
      <div class="role">Content strategist</div>
      <div class="bio">Desarrolla la estrategia editorial y el copywriting de cada proyecto. Contenido pensado para posicionar y para convencer.</div>
    </div>
    <div class="tm">
      <div class="tm-init">RA</div>
      <h4>Rosa María Ahumada</h4>
      <div class="role">IA &amp; automation specialist</div>
      <div class="bio">Diseña e implementa chatbots, automatizaciones y conexiones inteligentes entre plataformas para optimizar procesos.</div>
    </div>
    <div class="tm">
      <div class="tm-init">MR</div>
      <h4>María Ruiz</h4>
      <div class="role">UX/UI designer</div>
      <div class="bio">Responsable del diseño de interfaces y experiencia de usuario. Cada pantalla pensada para ser intuitiva, funcional y visualmente impecable.</div>
    </div>
  </div>
</section>

<!-- ─── PROYECTOS ─── -->
<section class="sec sec-w" id="proyectos" style="padding-bottom:2rem">
  <div class="sl rv">Proyectos</div>
  <h2 class="stt rv">Negocios que ya dieron el paso</h2>
  <p class="ss rv">Cada proyecto que entregamos tiene detrás un negocio real que decidió apostar por su presencia digital.</p>
</section>

<div class="cases-wrap">
  <div class="cases-g rv">
    <a href="https://aibymaia.com" target="_blank" rel="noopener" class="case case-dk">
      <div class="case-type">Agencia de marketing</div>
      <div class="case-name">MAIA</div>
      <div class="case-what">Web corporativa para agencia de growth marketing. Diseño premium con animaciones y sistema de captación integrado.</div>
      <div class="case-url">aibymaia.com</div>
    </a>
    <a href="https://musanailspain.com" target="_blank" rel="noopener" class="case case-lt">
      <div class="case-type">E-commerce · Belleza profesional</div>
      <div class="case-name">Mūsa Nails Spain</div>
      <div class="case-what">Tienda online de productos profesionales para uñas. Catálogo completo, pasarela de pago y centro de formación.</div>
      <div class="case-url">musanailspain.com</div>
    </a>
  </div>
</div>

<!-- ─── CONTACTO con Formulario ─── -->
<section class="sec contact-sec" id="contacto">
  <div class="contact-wrap">
    <div class="contact-intro rv">
      <div class="sl">Contacto</div>
      <h2 class="stt">¿Preparado para dar el <span class="ac">siguiente paso</span>?</h2>
      <p class="ss" style="margin-bottom:1.5rem">Cuéntanos tu proyecto y te respondemos en menos de 24 horas. Sin compromiso.</p>
      <div class="contact-links">
        <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          <?php echo esc_html($email); ?>
        </a>
        <a href="https://wa.me/<?php echo esc_attr($phone); ?>" target="_blank" rel="noopener" class="contact-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
          WhatsApp
        </a>
        <a href="mailto:<?php echo esc_attr($email); ?>?subject=Reservar%20videollamada%2015%20min" class="contact-link">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9.75a2.25 2.25 0 002.25-2.25v-9A2.25 2.25 0 0014.25 5.25H4.5A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/></svg>
          Videollamada 15 min
        </a>
      </div>
    </div>

    <form id="bonlineForm" class="contact-form rv d1" novalidate>
      <input type="hidden" name="action" value="bonline_contact">
      <input type="hidden" name="nonce" id="contactNonce" value="">

      <div class="cf-row">
        <div class="cf-field">
          <label for="cf-nombre">Nombre <span class="req">*</span></label>
          <input type="text" id="cf-nombre" name="nombre" placeholder="Tu nombre" required autocomplete="name">
        </div>
        <div class="cf-field">
          <label for="cf-email">Email <span class="req">*</span></label>
          <input type="email" id="cf-email" name="email" placeholder="tu@email.com" required autocomplete="email">
        </div>
      </div>

      <div class="cf-row">
        <div class="cf-field">
          <label for="cf-tel">Teléfono</label>
          <input type="tel" id="cf-tel" name="telefono" placeholder="+34 600 000 000" autocomplete="tel">
        </div>
        <div class="cf-field">
          <label for="cf-servicio">¿Qué necesitas?</label>
          <select id="cf-servicio" name="servicio">
            <option value="">Selecciona...</option>
            <option>Web corporativa</option>
            <option>Tienda online</option>
            <option>Rediseño de web existente</option>
            <option>SEO y posicionamiento</option>
            <option>IA y automatización</option>
            <option>Otro / No lo sé aún</option>
          </select>
        </div>
      </div>

      <div class="cf-field">
        <label for="cf-mensaje">Cuéntanos tu proyecto</label>
        <textarea id="cf-mensaje" name="mensaje" placeholder="¿Qué tipo de web necesitas? ¿Tienes web actualmente? ¿Cuándo te gustaría tenerla lista?" rows="4"></textarea>
      </div>

      <button type="submit" class="btn-grad form-btn" id="formSubmit">
        <span class="btn-txt">Enviar mensaje</span>
        <span class="btn-spin" hidden>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="spin"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
        </span>
        <svg class="btn-arr" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>

      <div class="form-msg" id="formMsg" role="alert" aria-live="polite"></div>
      <p class="form-privacy">Al enviar este formulario aceptas nuestra <a href="<?php echo esc_url(get_privacy_policy_url() ?: '#'); ?>">política de privacidad</a>.</p>
    </form>
  </div>
</section>

<?php get_footer(); ?>
