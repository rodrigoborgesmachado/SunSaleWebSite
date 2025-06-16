import React, { useEffect, useRef, useState } from 'react';
import styles from './HomeProjects.module.css';
import { WHATSAPP_NUMBER } from '../../config/constants';

const HomeProjects = () => {
  const sectionRef = useRef(null);
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
          observer.disconnect(); // dispara uma vez
        }
      },
      { threshold: 0.3 }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <section
      ref={sectionRef}
      className={`${styles['home-projects-section']} ${isVisible ? styles['animate-in'] : ''}`}
    >
      <div className={styles['home-projects-container']}>
        <h1 className={styles['home-projects-title']}>
          Projetos que conectam <span className={styles.highlightBlue}>tecnologia</span> e <span className={styles.highlightDarkBlue}>propósito</span>
        </h1>
        <p className={styles['home-projects-subtitle']}>
          Soluções inteligentes que simplificam a vida das pessoas, <br />
          criadas por uma equipe apaixonada por inovação e empatia.
        </p>
        <a
          href={`https://wa.me/${WHATSAPP_NUMBER}`}
          className={styles['home-projects-button']}
          target="_blank"
          rel="noopener noreferrer"
        >
          Vamos conversar?
        </a>
      </div>
    </section>
  );
};

export default HomeProjects;
