import { useState, useEffect } from 'react';
import projectsApi from '../../services/apiServices/projectsApi';
import styles from './Projects.module.css';

const CardsProjects = () => {
    const [items, setItems] = useState([]);
    const [page, _setPage] = useState(1);
    const [loading, setLoading] = useState(true);
    const quantity = 6;

    useEffect(() => {
        const fetchItems = async () => {
            try {
                setLoading(true);
                const response = await projectsApi.getPaginated(page, quantity);
                setItems(response.object || []);
            } catch {
                console.error('Erro ao buscar os itens.');
            } finally {
                setLoading(false);
            }
        };
        fetchItems();
    }, [page, quantity]);

    return (
        <section className={styles['projects-page-section']}>
            <h1 className={styles['projects-page-title']}>Nossos Projetos</h1>

            {loading ? (
                <div className={styles['projects-loading']}>Carregando projetos...</div>
            ) : items.length === 0 ? (
                <div className={styles['projects-empty']}>
                    Nenhum projeto disponível no momento. Volte em breve!
                </div>
            ) : (
                <ul className={styles['projects-grid']}>
                    {items.map((item) => (
                        <li key={item.id} className={styles['projects-card']}>
                            <img src={item.capa} alt={item.titulo} className={styles['projects-image']} />
                            <h2 className={styles['projects-title']}>{item.titulo}</h2>
                            <p className={styles['projects-intro']}>{item.intro}</p>
                            <h3 className={styles['projects-detail-title']}>Mais detalhes</h3>
                            <div
                                className={styles['projects-description']}
                                dangerouslySetInnerHTML={{ __html: item.descricao }}
                            />
                            <a
                                href={item.link}
                                target="_blank"
                                rel="noopener noreferrer"
                                className={styles['projects-button']}
                            >
                                Ver solução →
                            </a>
                        </li>
                    ))}
                </ul>
            )}
        </section>
    );
};

export default CardsProjects;
