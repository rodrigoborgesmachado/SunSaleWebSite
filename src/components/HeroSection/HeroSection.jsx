import React from 'react';
import styles from './HeroSection.module.css';
import logoIcon from '/img/Logo_Azul.png';
import { WHATSAPP_LINK } from '../../config/constants.js';

const HeroSection = () => {
  return (
    <section className={styles['hero-section']} id="inicio">
      <div className={styles['hero-container']}>
        <div className={styles['hero-overlay']}>
          <img src={logoIcon} alt="Ícone SunSale" className={styles['hero-icon']} />
          <h1>
            <strong>Software House</strong><br />
            especializada em<br />
            soluções sob medida.
          </h1>
          <div className={styles['hero-highlight']}>
            Inovação para transformar rotinas e conectar pessoas.
          </div>
          <a
            href={WHATSAPP_LINK}
            className={styles['hero-cta']}
            target="_blank"
            rel="noopener noreferrer"
          >
            Vamos conversar?
          </a>
        </div>
      </div>
    </section>
  );
};

export default HeroSection;
