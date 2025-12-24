import React from 'react';
import styles from './AboutSection.module.css';
import rodrigoImage from '/img/rodrigo-1.jpeg';

const cardsInfo = [
    {
        titulo: 'Fundação',
        texto: 'Desde 2015 desenvolvendo com propósito.',
        icone: '/img/AboutSection_1_foguete.svg'
    },
    {
        titulo: 'Valores',
        texto: 'Soluções centradas no usuário, com ética e inovação.',
        icone: '/img/AboutSection_2_lampada.svg'
    },
    {
        titulo: 'Equipe',
        texto: 'Profissionais apaixonados por resolver problemas reais.',
        icone: '/img/AboutSection_3_equipe.svg'
    }
];

const AboutSection = () => {
    return (
        <section className={styles['about-section']} id="quem-somos">
            <div className={styles['about-container']}>
                <div className={styles['about-content']}>
                    <div className={styles['about-text']}>
                        <h2>Quem Somos</h2>
                        <p>
                            Desde 2015, a <span className={styles.brand}>SunSale System</span> cria soluções de tecnologia
                            que transformam rotinas, simplificam processos e ajudam pessoas e empresas a crescer. Somos movidos
                            pelo propósito de unir inovação, empatia e <strong>resultados reais</strong>.<br />
                            Nosso time acredita que tecnologia só faz sentido quando aproxima e facilita a vida das pessoas.
                        </p>

                        <div className={styles['about-cards']}>
                            {cardsInfo.map((card, index) => (
                                <div className={styles.card} key={index}>
                                    <img src={card.icone} alt={card.titulo} className={styles.icon} />
                                    <h4>{card.titulo}</h4>
                                    <p>{card.texto}</p>
                                </div>
                            ))}
                        </div>
                    </div>

                    <div className={styles['about-image']}>
                        <img
                            src={rodrigoImage}
                            alt="Rodrigo"
                            className={styles['about-avatar']}
                        />
                    </div>
                </div>
            </div>
        </section>
    );
};

export default AboutSection;



