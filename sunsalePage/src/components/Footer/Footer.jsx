import React from 'react';
import styles from './Footer.module.css';
import { WHATSAPP_LINK } from '../../config/constants';

const contacts = [
  {
    nome: 'WhatsApp',
    icone: '/img/Foother_1_Whatsapp.svg',
    link: WHATSAPP_LINK
  },
  {
    nome: 'LinkedIn',
    icone: '/img/Foother_3_linkedIn.svg',
    link: 'https://www.linkedin.com/company/sunsale-system/'
  },
  {
    nome: 'GitHub',
    icone: '/img/Foother_4_Github.svg',
    link: 'https://github.com/rodrigoborgesmachado'
  }
];

const Footer = () => {
  return (
    <footer className={styles.footer}>
      <div className={styles['footer-shape']} />
      <div className={styles['footer-top-grid']}>
        {Array.from({ length: 10 }).map((_, i) => (
          <div className={styles['footer-top-block']} key={i} />
        ))}
      </div>

      <div className={styles['footer-content']}>
        {/* Coluna 1: Contato */}
        <div className={styles['footer-contact']}>
          <h4>Entre em contato</h4>
          <ul>
            {contacts.map((contato, index) => (
              <li key={index}>
                <a href={contato.link} target="_blank" rel="noopener noreferrer">
                  <img src={contato.icone} alt={contato.nome} />
                  {contato.nome}
                </a>
              </li>
            ))}
          </ul>
        </div>

        {/* Coluna 2: Bloco de destaque */}
        <div className={styles['footer-share']}>
          <h4>
            <img src="/img/Foother_5_compartilhar.svg" alt="Compartilhar" />
            Acreditamos em compartilhar conhecimento.
          </h4>
          <p>
            Veja os artigos e contribuições da SunSale para a comunidade Dev.
          </p>
          <a
            href="https://example.com/artigos"
            className={styles['footer-button']}
            target="_blank"
            rel="noopener noreferrer"
          >
            <img src="/img/Foother_6_livro.svg" alt="Artigos" />
            Acesse nossos artigos técnicos
          </a>
        </div>
      </div>

      {/* Linha e base */}
      <div className={styles['footer-bottom']}>
        <ul className={styles['footer-nav']}>
          <li><a href="#inicio">Início</a></li>
          <li><a href="#quem-somos">Quem Somos</a></li>
          <li><a href="#servicos">Serviços</a></li>
          <li><a href="#autoridade">Autoridade</a></li>
          <li><a href="#projetos">Projetos</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>

        <p>SunSale System © 2025 — Todos os direitos reservados.</p>
      </div>
    </footer>
  );
};

export default Footer;
