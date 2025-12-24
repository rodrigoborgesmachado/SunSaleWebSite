import React from 'react';
import styles from './FeaturedProjectsSection.module.css';

const projects = [
  {
    nome: 'Questões Aqui',
    descricao:
      'Plataforma de exercícios para estudantes e professores, com recursos interativos e relatórios.',
    imagem: '/img/questoesAqui.png',
    link: 'https://www.questoesaqui.com/'
  },
  {
    nome: 'Tabuada Divertida',
    descricao:
      'Aplicativo educativo que torna o aprendizado da matemática mais lúdico e envolvente.',
    imagem: '/img/tabuadaDivertida.png',
    link: 'https://www.tabuadadivertida.com/'
  },
  {
    nome: 'CrudForms',
    descricao:
      'Sistema para gestão de cadastros e processos internos, prático e personalizável.',
    imagem: '/img/crudForms.png',
    link: 'https://www.crudforms.com/'
  }
];

const FeaturedProjectsSection = () => {
  return (
    <section className={styles['projects-section']} id="projetos">
      <div className={styles['projects-container']}>
        <h2 className={styles['projects-title']}>Nossos Projetos</h2>
        <div className={styles['projects-cards']}>
          {projects.map((project, index) => (
            <div className={styles['projects-card']} key={index}>
              <img
                src={project.imagem}
                alt={project.nome}
                className={styles['projects-image']}
              />
              <h4>{project.nome}</h4>
              <p>{project.descricao}</p>
              <a
                href={project.link}
                className={styles['projects-button']}
                target="_blank"
                rel="noopener noreferrer"
              >
                Ver mais
                <img
                  src="/img/FeaturedProjectsSection_1_abrir.svg"
                  alt="Ícone Ver mais"
                  className={styles['projects-icon-button']}
                />
              </a>
            </div>
          ))}
        </div>
        <a href="/projetos" className={styles['projects-view-all']}>
          Ver todos os projetos
          <img
            src="/img/FeaturedProjectsSection_2_VerTodos.svg"
            alt="Ícone Ver todos os projetos"
            className={styles['projects-icon-svg']}
          />
        </a>
      </div>
    </section>
  );
};

export default FeaturedProjectsSection;
