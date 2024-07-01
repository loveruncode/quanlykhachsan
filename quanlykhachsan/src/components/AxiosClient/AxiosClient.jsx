import axios from 'axios';

axios.defaults.headers.common['Accept'] = 'application/json';
axios.defaults.headers.common['Content-Type'] = 'application/json';

export const Get = async ({ endPoint, data, Authorization }) => {
    try {
        const res = await axios.get(`/api/${endPoint}`, {
            headers: {
                Authorization: Authorization
            },
            params: data
        });
        return res;
    } catch (error) {
        console.error('Error fetching data:', error);
        return { ok: false, status: error.response?.status, data: error.response?.data };
    }
};

export const Post = async ({ endPoint, data }) => {
    try {
        const res = await axios.post(`/api/${endPoint}`, data);
        return res;
    } catch (error) {
        console.error('Error fetching data:', error);
        return { ok: false, status: error.response?.status, data: error.response?.data };
    }
};

export const Put = async () => {};
