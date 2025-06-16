import api from './serviceApi'; 

const projectsApi = {
    /**
     * Fetch a paginated list of items with optional filters.
     * @param {Object} params - Query parameters such as `page`, `quantity`, `isActive`, `term`, `orderBy`, `include`.
     * @returns {Promise<Object>} - The paginated list of items.
     */
    getPaginated: async (page, max) => {
        try {
            const response = await api.get(`/api/Postagem/pagged?page=${page}&quantity=${max}&tipoPostagem=Featured_Projects`);
            return response.data;
        } catch (error) {
            console.error('Error fetching paginated items:', error);
            throw error;
        }
    },
};

export default projectsApi;