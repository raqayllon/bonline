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

  /* ── Auto-bounce logo "b" every 4 s ── */
  const logoB = document.getElementById('logoB');
  if (logoB) {
    const doBounce = () => {
      logoB.classList.remove('bounce');
      void logoB.offsetWidth; // reflow
      logoB.classList.add('bounce');
    };
    setInterval(doBounce, 4000);
    logoB.addEventListener('click', doBounce);
    logoB.addEventListener('animationend', () => logoB.classList.remove('bounce'));
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
      r: '¡Hola! Tenemos 3 planes:\n\n💻 Digital — 990€ + IVA\nWeb profesional, hasta 8 secciones, SEO y formulario.\n\n⭐ Premium — 1.990€ + IVA\nTodo lo anterior + estrategia, redes sociales y soporte post-lanzamiento.\n\n🚀 A medida — Precio personalizado\nE-commerce, reservas, multiidioma, CRM…\n\n¿Te cuento más sobre algún plan?'
    },
    {
      k: ['web','página','pagina','website','corporativa','landing'],
      r: 'Diseñamos webs 100% a medida, sin plantillas genéricas.\n\n✅ Diseño personalizado\n✅ Adaptada a móvil y tablet\n✅ Optimizada para Google\n✅ Carga ultrarrápida\n\n¿Ya tienes en mente el tipo de web que necesitas?'
    },
    {
      k: ['seo','google','posicionamiento','aparecer','búsqueda','busqueda'],
      r: 'El SEO es fundamental para que te encuentren en Google.\n\nTrabajamos:\n🔍 SEO técnico (velocidad, estructura)\n📝 Estrategia de contenidos\n📍 Google Business Profile\n\nTodos los planes incluyen SEO básico. El Premium incluye estrategia completa.'
    },
    {
      k: ['tienda','ecommerce','e-commerce','vender','venta','shop','productos'],
      r: '¡Montamos tiendas online completas! 🛍️\n\n✅ Catálogo de productos\n✅ Pasarela de pago (Stripe / PayPal / Redsys)\n✅ Gestión de pedidos y stock\n✅ Panel de administración sencillo\n\nEl precio depende del catálogo. ¿Me cuentas más?'
    },
    {
      k: ['chatbot','bot','ia','inteligencia','automatización','automatizar','automatizacion','whatsapp business'],
      r: 'Implementamos chatbots inteligentes y automatizaciones 🤖\n\n• Chatbot en tu web (como este)\n• WhatsApp Business automatizado\n• Email marketing automático\n• CRM integrado\n• Respuestas 24/7\n\n¿Para qué tipo de negocio lo necesitas?'
    },
    {
      k: ['tiempo','plazo','cuándo','cuando','semana','entrega','tardar','rápido','rapido'],
      r: '⏱️ Plazos habituales:\n\n• Web Digital: 2-3 semanas\n• Web Premium: 3-5 semanas\n• Proyectos a medida: según alcance\n\nEmpezamos con una reunión inicial y te damos un calendario detallado. ¿Tienes alguna fecha límite?'
    },
    {
      k: ['proceso','cómo','como','funciona','pasos','paso','trabaja'],
      r: 'Nuestro proceso en 4 pasos:\n\n1️⃣ Nos conocemos — Llamada gratuita de 15 min\n2️⃣ Diseñamos — Propuesta visual a medida\n3️⃣ Desarrollamos — Código limpio y rápido\n4️⃣ Lanzamos — Publicamos y configuramos todo\n\n¿Empezamos con esa llamada?'
    },
    {
      k: ['contacto','hablar','llamar','email','correo','reunión','reunion','videollamada','llamada'],
      r: 'Puedes contactarnos así:\n\n📧 hola@bonline.es\n📱 WhatsApp (botón abajo)\n📅 Videollamada gratuita de 15 min\n\n¡Respondemos en menos de 24 horas! 🙌'
    },
    {
      k: ['quién','quien','equipo','somos','empresa','agencia','sois'],
      r: 'Somos b online, agencia digital en Madrid y Barcelona 🌐\n\nNuestro equipo:\n👤 Sergio — Estrategia\n👤 Raquel — Marketing\n👤 Jose — Desarrollo\n👤 Laura — Contenidos\n👤 Rosa — IA & automatización\n👤 María — UX/UI\n\nTrabajamos sin intermediarios, directamente contigo.'
    },
    {
      k: ['pago','factura','financiación','financiacion','plazos','forma de pago'],
      r: 'Trabajamos con precio cerrado desde el inicio 💳\n\nForma de pago:\n• 50% al comenzar el proyecto\n• 50% en la entrega\n\nFactura con IVA. Sin sorpresas.'
    },
    {
      k: ['hola','buenas','hey','buenos días','buenos dias','buenas tardes','buenas noches'],
      r: '¡Hola! 👋 Soy el asistente de b online.\n\nPuedo ayudarte con precios, servicios, proceso de trabajo o cualquier duda sobre tu proyecto digital. ¿Por dónde empezamos?'
    },
    {
      k: ['gracias','genial','perfecto','ok','vale','bien'],
      r: 'De nada 😊 Estamos aquí para lo que necesites. Si quieres hablar con el equipo directamente, escríbenos a hola@bonline.es o por WhatsApp.'
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
