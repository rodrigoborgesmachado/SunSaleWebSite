import React, { useEffect, useState } from 'react';
import styles from './Header.module.css';
import logo from '/img/Logo_Azul.png';

const Header = () => {
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const [scrolled, setScrolled] = useState(false);
    const [activeSection, setActiveSection] = useState('');

    const toggleMenu = () => setIsMenuOpen(!isMenuOpen);

    useEffect(() => {
        const handleScroll = () => {
            setScrolled(window.scrollY > 50);

            // Seções que vamos monitorar
            const sections = ['inicio', 'quem-somos', 'servicos', 'autoridade', 'projetos'];
            for (let id of sections) {
                const el = document.getElementById(id);
                if (el) {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= 100 && rect.bottom >= 100) {
                        setActiveSection(id);
                        break;
                    }
                }
            }
        };

        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    return (
        <header className={`${styles.header} ${scrolled ? styles.scrolled : ''}`}>
            <a href="/" onClick={() => setIsMenuOpen(false)} className={styles.logoLink}>
                <div className={styles.logoContainer}>
                    <img src={logo} alt="SunSale Logo" className={styles.logo} />
                    <span className={styles.brand}>SunSale System</span>
                </div>
            </a>

            <nav className={`${styles.nav} ${isMenuOpen ? styles.navOpen : ''}`}>
                <a href="/#inicio" onClick={() => setIsMenuOpen(false)} className={activeSection === 'inicio' ? styles.active : ''}>Início</a>
                <a href="/#quem-somos" onClick={() => setIsMenuOpen(false)} className={activeSection === 'quem-somos' ? styles.active : ''}>Quem Somos</a>
                <a href="/#servicos" onClick={() => setIsMenuOpen(false)} className={activeSection === 'servicos' ? styles.active : ''}>Serviços</a>
                <a href="/#autoridade" onClick={() => setIsMenuOpen(false)} className={activeSection === 'autoridade' ? styles.active : ''}>Autoridade</a>
                <a href="/#projetos" onClick={() => setIsMenuOpen(false)} className={activeSection === 'projetos' ? styles.active : ''}>Projetos</a>
            </nav>

            <div className={styles.hamburger} onClick={toggleMenu}>
                <span className={styles.bar}></span>
                <span className={styles.bar}></span>
                <span className={styles.bar}></span>
            </div>
        </header>
    );
};

export default Header;
