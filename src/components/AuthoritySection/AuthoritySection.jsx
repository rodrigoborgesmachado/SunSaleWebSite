import React from 'react';
import styles from './AuthoritySection.module.css';

const authorityData = [
    {
        icone: '/img/AuthoritySection_1_calendario.svg',
        valor: '+8',
        texto: 'Anos no mercado'
    },
    {
        icone: '/img/AuthoritySection_2_compartilhar.svg',
        valor: '+50',
        texto: 'Projetos entregues'
    },
    {
        icone: '/img/AuthoritySection_3_emoji.svg',
        valor: '+30',
        texto: 'Clientes satisfeitos'
    },
    {
        icone: '/img/AuthoritySection_4_planeta.svg',
        valor: 'Brasil',
        texto: 'Atuação nacional'
    }
];

const AuthoritySection = () => {
    return (
        <section className={styles['authority-section']} id="autoridade">
            <div className={styles['authority-container']}>
                <h2 className={styles.title}>Nossos Números</h2>
                <div className={styles.cards}>
                    {authorityData.map((item, index) => (
                        <div
                            className={styles.card}
                            key={index}
                            style={{ '--i': index }}
                        >
                            <img src={item.icone} alt={item.texto} className={styles.icon} />
                            <strong>{item.valor}</strong>
                            <p>{item.texto}</p>
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
};

export default AuthoritySection;
