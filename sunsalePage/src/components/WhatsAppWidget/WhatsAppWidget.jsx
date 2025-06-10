import React, { useEffect, useState } from 'react';
import { FloatingWhatsApp } from 'react-floating-whatsapp';
import logo from '/img/WhatsApp_img.jpg';
import { WHATSAPP_NUMBER } from '../../config/constants';

const WhatsAppWidget = () => {
  const [showNotification, setShowNotification] = useState(false);
  const [isMobile, setIsMobile] = useState(false);

  useEffect(() => {
    // Detecta se a tela é mobile
    const checkIfMobile = () => {
      setIsMobile(window.innerWidth <= 768);
    };

    checkIfMobile(); // executa na montagem
    window.addEventListener('resize', checkIfMobile); // atualiza ao redimensionar

    const timeout = setTimeout(() => setShowNotification(true), 10000); // 10s

    return () => {
      window.removeEventListener('resize', checkIfMobile);
      clearTimeout(timeout);
    };
  }, []);

  return (
    <FloatingWhatsApp
      phoneNumber={WHATSAPP_NUMBER}
      accountName="SunSale System"
      avatar={logo}
      statusMessage={
        isMobile
          ? 'Atendimento em horário comercial'
          : 'Atendimento em horário comercial: seg a sex'
      }
      chatMessage={
        isMobile
          ? 'Olá! 👋 Está buscando soluções sob medida?'
          : 'Olá! 👋 Está buscando soluções sob medida? Fale com a gente, podemos te ajudar.'
      }
      placeholder="Digite sua mensagem..."
      messageDelay={0}
      notification={showNotification}
      notificationSound={showNotification}
      allowClickAway
      allowEsc
      zIndex={999}
    />
  );
};

export default WhatsAppWidget;
