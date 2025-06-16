import React from 'react';
import styles from './ServicesSection.module.css';
import servicesImage from '/img/ServicesSection_Dev_img.png';

const servicesData = [
  {
    titulo: 'Consultoria em TI',
    texto: 'Ajudamos a encontrar o melhor caminho tecnológico.',
    icone: '/img/ServicesSection_1_consultoria.svg'
  },
  {
    titulo: 'Desenvolvimento Web/Desk',
    texto: 'Criamos sistemas funcionais e intuitivos.',
    icone: '/img/ServicesSection_2_Dev.svg'
  },
  {
    titulo: 'Soluções sob demanda',
    texto: 'Projetos personalizados para cada necessidade.',
    icone: '/img/ServicesSection_3_solucoes.svg'
  }
];

const ServicesSection = () => {
  return (
    <section className={styles['services-section']} id="servicos">
      <div className={styles['services-container']}>
        <div className={styles['services-content']}>
          <div className={styles['services-image']}>
            <img src={servicesImage} alt="Serviços de tecnologia" />
          </div>

          <div className={styles['services-text']}>
            <h2>O que fazemos</h2>
            <p>
              Soluções sob medida para quem busca eficiência, qualidade e uma abordagem personalizada.
              Conheça nossos principais serviços:
            </p>

            <div className={styles['services-cards']}>
              {servicesData.map((item, index) => (
                <div className={styles.card} key={index}>
                  <img src={item.icone} alt={item.titulo} className={styles.icon} />
                  <h4>{item.titulo}</h4>
                  <p>{item.texto}</p>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default ServicesSection;
