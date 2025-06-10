import { useState, useEffect } from 'react';
import projectsApi from '../../services/apiServices/projectsApi';

const Projects = () => {
    const [items, setItems] = useState([]);
    const [page, setPage] = useState(1);
    const quantity = 6; 

    useEffect(() => {
        const fetchItems = async () => {
            try {
                const response = await projectsApi.getPaginated(page, quantity);
                setItems(response.object);
            } catch (error) {
                toast.error('Erro ao buscar os itens.');
            } 
        };
        fetchItems();
    }, [page, quantity]);

    const handlePageChange = (newPage) => {
        if (newPage > 0 && newPage <= totalPages) {
            setPage(newPage);
        }
    };

    if(!items)
        return (<p>Carregando</p>)

    return (
    <div className="">
        <div className=''>
            <ul className='project-list'>
                {items.map((item) => (
                    <li key={item.id} className='project-card'>
                        <div className='project-header'>
                            <img src={item.capa} alt={item.titulo} className='project-image' />
                            <div>
                                <h2 className='project-title'>{item.titulo}</h2>
                                <a href={item.link} target='_blank' rel='noopener noreferrer' className='project-link'>
                                    Acessar Projeto
                                </a>
                            </div>
                        </div>
                        <p className='project-intro'>{item.intro}</p>
                        <div
                            className='project-description'
                            dangerouslySetInnerHTML={{ __html: item.descricao }}
                        />
                        <div className='project-footer'>
                            <span>Curtidas: {item.curtidas}</span>
                            <span>Criado em: {new Date(item.created).toLocaleDateString()}</span>
                            <span>Atualizado em: {new Date(item.updated).toLocaleDateString()}</span>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    </div>
    );
};

export default Projects;

