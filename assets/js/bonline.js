(function () {
  'use strict';

  /* ── Scroll reveal ── */
  const observer = new IntersectionObserver(entries => {
    entries.forEach(el => { if (el.isIntersecting) el.target.classList.add('vis'); });
  }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
  document.querySelectorAll('.rv').forEach(el => observer.observe(el));

  /* ── Smooth scroll anchors ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      // close mobile menu if open
      document.getElementById('mobMenu')?.classList.remove('open');
      document.getElementById('hamBtn')?.classList.remove('open');
      document.getElementById('hamBtn')?.setAttribute('aria-expanded', 'false');
    });
  });

  /* ── Hamburger menu ── */
  const hamBtn = document.getElementById('hamBtn');
  const mobMenu = document.getElementById('mobMenu');
  hamBtn?.addEventListener('click', () => {
    const isOpen = mobMenu.classList.toggle('open');
    hamBtn.classList.toggle('open', isOpen);
    hamBtn.setAttribute('aria-expanded', String(isOpen));
  });

  /* ── Nav shadow on scroll ── */
  const nav = document.getElementById('mainNav');
  window.addEventListener('scroll', () => {
    nav?.classList.toggle('scrolled', window.scrollY > 20);
  }, { passive: true });

  /* ── Auto-bounce only the dot every 2.5s ── */
  const logoB   = document.getElementById('logoB');
  const logoDot = document.querySelector('#logoB .logo-dt');
  if (logoDot) {
    const doBounce = () => {
      logoDot.classList.remove('bounce');
      void logoDot.offsetWidth;
      logoDot.classList.add('bounce');
    };
    setInterval(doBounce, 2500);
    logoB?.addEventListener('click', doBounce);
    logoDot.addEventListener('animationend', () => logoDot.classList.remove('bounce'));
  }

  /* ── Contact form ── */
  const form = document.getElementById('bonlineForm');
  if (form) {
    // inject nonce from WP
    const nonceInput = document.getElementById('contactNonce');
    if (nonceInput && window.bonlineData) nonceInput.value = bonlineData.nonce;

    form.addEventListener('submit', async e => {
      e.preventDefault();
      const btn     = document.getElementById('formSubmit');
      const msgEl   = document.getElementById('formMsg');
      const btnTxt  = btn.querySelector('.btn-txt');
      const btnSpin = btn.querySelector('.btn-spin');
      const btnArr  = btn.querySelector('.btn-arr');

      // loading state
      btn.disabled = true;
      btnTxt.textContent = 'Enviando...';
      btnSpin.hidden = false;
      btnArr.hidden  = true;
      msgEl.className = 'form-msg';
      msgEl.textContent = '';

      try {
        const data = new FormData(form);
        data.set('action', 'bonline_contact');
        if (window.bonlineData) data.set('nonce', bonlineData.nonce);

        const res  = await fetch(window.bonlineData?.ajaxurl || '/wp-admin/admin-ajax.php', {
          method: 'POST', body: data
        });
        const json = await res.json();

        if (json.success) {
          msgEl.className = 'form-msg ok';
          msgEl.textContent = json.data?.message || '¡Mensaje enviado! Te responderemos pronto.';
          form.reset();
        } else {
          throw new Error(json.data?.message || 'Error al enviar.');
        }
      } catch (err) {
        msgEl.className = 'form-msg err';
        msgEl.textContent = err.message;
      } finally {
        btn.disabled = false;
        btnTxt.textContent = 'Enviar mensaje';
        btnSpin.hidden = true;
        btnArr.hidden  = false;
      }
    });
  }


  /* ── Chatbot ── */
  const KB = [
    {
      k: ['precio','cuánto','cuanto','coste','cuesta','presupuesto','tarifa','vale'],
      r: 'Tenemos tres opciones de precio.\n\nEl plan Digital cuesta 990 euros más IVA. Incluye web profesional de hasta 8 secciones, diseño a medida, adaptada a móvil y optimizada para Google.\n\nEl plan Premium cuesta 1.990 euros más IVA y es el que más eligen nuestros clientes. Incluye todo lo anterior, más estrategia de contenidos, integración con redes sociales y soporte post-lanzamiento.\n\nPara proyectos más complejos como tiendas online, reservas o integraciones especiales, hacemos un presupuesto personalizado.\n\n¿Algún plan encaja con lo que necesitas?'
    },
    {
      k: ['web','página','pagina','website','corporativa','landing'],
      r: 'Diseñamos webs completamente a medida, sin plantillas genéricas. Cada proyecto empieza desde cero pensando en tu negocio, tu público y tus objetivos.\n\nTodas nuestras webs son rápidas, se ven bien en móvil y están optimizadas para aparecer en Google desde el primer día.\n\n¿Tienes ya alguna idea de lo que buscas?'
    },
    {
      k: ['seo','google','posicionamiento','aparecer','búsqueda','busqueda','buscador'],
      r: 'Trabajamos el SEO desde el principio del proyecto, no como un añadido final. Eso incluye la estructura técnica de la web, la velocidad de carga, los contenidos y la ficha de Google Business.\n\nEl plan Digital incluye SEO básico. El Premium incluye estrategia de contenidos completa.\n\n¿Tu web ya existe o la estamos construyendo desde cero?'
    },
    {
      k: ['tienda','ecommerce','e-commerce','vender','venta','shop','productos','online'],
      r: 'Montamos tiendas online completas con catálogo de productos, pasarela de pago (Stripe, PayPal o Redsys) y gestión de pedidos. Todo desde un panel de administración sencillo que tú puedes manejar sin conocimientos técnicos.\n\nEl precio depende del volumen del catálogo y las funcionalidades. ¿Me cuentas un poco más sobre tu proyecto?'
    },
    {
      k: ['chatbot','bot','ia','inteligencia','automatización','automatizar','automatizacion','whatsapp business','whatsapp'],
      r: 'Diseñamos e implementamos chatbots y automatizaciones que trabajan por tu negocio las 24 horas. Desde un asistente en la web como este, hasta flujos automáticos en WhatsApp Business o integraciones con tu CRM.\n\nEs algo que cada vez más negocios utilizan para responder consultas, cualificar leads y ahorrar tiempo. ¿Tienes algún proceso concreto en mente que te gustaría automatizar?'
    },
    {
      k: ['tiempo','plazo','cuándo','cuando','semana','entrega','tardar','rápido','rapido','urgente'],
      r: 'Los plazos habituales son dos o tres semanas para el plan Digital, tres o cinco semanas para el Premium, y según alcance para proyectos a medida.\n\nSiempre empezamos con una reunión inicial donde te damos un calendario detallado. Si tienes una fecha límite, cuéntanosla y vemos cómo organizarnos.'
    },
    {
      k: ['proceso','cómo','como','funciona','pasos','paso','trabaja','trabajáis','trabajais'],
      r: 'El proceso tiene cuatro fases. Primero nos conocemos en una llamada de 15 minutos sin compromiso. Después diseñamos una propuesta visual a medida que tú validas. Luego construimos la web con código limpio y optimizado. Y por último la publicamos, configuramos todo y te acompañamos las primeras semanas.\n\nEn todo momento sabes en qué punto estamos. ¿Te gustaría empezar con esa llamada?'
    },
    {
      k: ['contacto','hablar','llamar','email','correo','reunión','reunion','videollamada','llamada','escribir'],
      r: 'Puedes escribirnos a hola@bonline.es o por WhatsApp. También puedes reservar una videollamada gratuita de 15 minutos si prefieres hablarlo en persona.\n\nRespondemos en menos de 24 horas.'
    },
    {
      k: ['quién','quien','equipo','somos','empresa','agencia','sois','trabajáis','trabajais'],
      r: 'Somos b online, una agencia digital con sede en Madrid y Barcelona. Trabajamos de forma directa, sin intermediarios, lo que significa que la persona con quien hablas es la que trabaja en tu proyecto.\n\nEl equipo lo forman Sergio en estrategia, Raquel en marketing, Jose en desarrollo, Laura en contenidos, Rosa en IA y automatización, y María en diseño UX y UI.'
    },
    {
      k: ['pago','factura','financiación','financiacion','plazos','forma de pago','cobráis','cobrar'],
      r: 'El precio es cerrado desde el primer día, sin sorpresas ni letra pequeña. Se paga en dos partes: el 50% al inicio del proyecto y el 50% en la entrega. Emitimos factura con IVA incluido.'
    },
    {
      k: ['hola','buenas','hey','buenos días','buenos dias','buenas tardes','buenas noches','ey'],
      r: 'Hola, soy el asistente de b online. Puedo ayudarte con información sobre precios, servicios, plazos o el proceso de trabajo. ¿En qué te puedo orientar?'
    },
    {
      k: ['gracias','genial','perfecto','ok','vale','bien','entendido'],
      r: 'De nada. Si en algún momento quieres hablar directamente con el equipo, escríbenos a hola@bonline.es o por WhatsApp. Estamos disponibles de lunes a viernes.'
    },
  ];

  function getBotResponse(msg) {
    const m = msg.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    for (const item of KB) {
      if (item.k.some(k => m.includes(k.normalize('NFD').replace(/[\u0300-\u036f]/g, '')))) {
        return item.r;
      }
    }
    return 'Buena pregunta 🤔 No tengo esa respuesta de forma automática, pero el equipo puede ayudarte en minutos.\n\n📧 hola@bonline.es\n📅 Videollamada gratuita\n\n¿Hay algo más en lo que pueda orientarte?';
  }

  const chatBtn    = document.getElementById('chatBtn');
  const chatWindow = document.getElementById('chatWindow');
  const chatClose  = document.getElementById('chatClose');
  const chatMsgs   = document.getElementById('chatMsgs');
  const chatInput  = document.getElementById('chatInput');
  const chatSend   = document.getElementById('chatSend');
  const chatBadge  = document.getElementById('chatBadge');

  if (chatBtn && chatWindow) {
    let opened = false;

    function addMsg(text, type) {
      const div = document.createElement('div');
      div.className = 'msg ' + type;
      div.textContent = text;
      chatMsgs.appendChild(div);
      chatMsgs.scrollTop = chatMsgs.scrollHeight;
    }

    function showTyping() {
      const t = document.createElement('div');
      t.className = 'msg bot msg-typing';
      t.id = 'typing';
      t.innerHTML = '<span></span><span></span><span></span>';
      chatMsgs.appendChild(t);
      chatMsgs.scrollTop = chatMsgs.scrollHeight;
    }

    function removeTyping() {
      document.getElementById('typing')?.remove();
    }

    function sendMessage() {
      const txt = chatInput.value.trim();
      if (!txt) return;
      addMsg(txt, 'usr');
      chatInput.value = '';
      showTyping();
      setTimeout(() => {
        removeTyping();
        addMsg(getBotResponse(txt), 'bot');
      }, 700 + Math.random() * 600);
    }

    function openChat() {
      chatWindow.classList.add('open');
      chatWindow.setAttribute('aria-hidden', 'false');
      chatBtn.classList.add('open');
      chatBtn.setAttribute('aria-expanded', 'true');
      chatBadge.classList.add('hidden');
      if (!opened) {
        opened = true;
        setTimeout(() => addMsg('¡Hola! 👋 Soy el asistente de b online.\n\n¿En qué puedo ayudarte? Pregúntame sobre precios, servicios, proceso de trabajo o lo que necesites.', 'bot'), 300);
      }
      setTimeout(() => chatInput.focus(), 350);
    }

    function closeChat() {
      chatWindow.classList.remove('open');
      chatWindow.setAttribute('aria-hidden', 'true');
      chatBtn.classList.remove('open');
      chatBtn.setAttribute('aria-expanded', 'false');
    }

    chatBtn.addEventListener('click', () => {
      chatWindow.classList.contains('open') ? closeChat() : openChat();
    });
    chatClose.addEventListener('click', closeChat);
    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keydown', e => { if (e.key === 'Enter') sendMessage(); });

    // open after 8s if not interacted
    setTimeout(() => {
      if (!opened) chatBadge.classList.remove('hidden');
    }, 8000);
  }

})();
