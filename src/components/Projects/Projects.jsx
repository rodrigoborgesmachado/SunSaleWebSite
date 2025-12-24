import { useState, useEffect } from 'react';
import styles from './Projects.module.css';

const CardsProjects = () => {
    const [items, setItems] = useState([]);
    const [loading, setLoading] = useState(true);
    const [page, setPage] = useState(1);
    const [total, setTotal] = useState(0);
    const quantity = 6;

    useEffect(() => {
        const fetchItems = async () => {
            try {
                setLoading(true);
                const apiUrl = `https://apisunsale.azurewebsites.net/api/Postagem/pagged?page=${page}&quantity=${quantity}&tipoPostagem=Featured_Projects`;
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error(`Request failed: ${response.status}`);
                }
                const data = await response.json();
                setItems(data.object || []);
                setTotal(Number(data.total) || 0);
            } catch {
                console.error('Erro ao buscar os itens.');
            } finally {
                setLoading(false);
            }
        };
        fetchItems();
    }, [page, quantity]);

    const totalPages = Math.max(1, Math.ceil(total / quantity));

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
            {!loading && items.length > 0 && totalPages > 1 && (
                <nav className={styles['projects-pagination']} aria-label="Paginação de projetos">
                    <button
                        type="button"
                        className={styles['pagination-button']}
                        onClick={() => setPage((prev) => Math.max(1, prev - 1))}
                        disabled={page === 1}
                    >
                        Anterior
                    </button>
                    <span className={styles['pagination-info']}>
                        Página {page} de {totalPages}
                    </span>
                    <button
                        type="button"
                        className={styles['pagination-button']}
                        onClick={() => setPage((prev) => Math.min(totalPages, prev + 1))}
                        disabled={page === totalPages}
                    >
                        Próxima
                    </button>
                </nav>
            )}
        </section>
    );
};

export default CardsProjects;
