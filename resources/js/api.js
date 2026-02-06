import axios from 'axios';


const api = axios.create({
  baseURL: process.env.API_ENDPOINT,
});

const accessApi = axios.create({
  baseURL: process.env.API_ENDPOINT + '/movie',
});


api.interceptors.request.use((config) => {
  const token = localStorage.getItem('access_token');
  if (token) config.headers.Authorization = `Bearer ${token}`;
  return config;
});

export default api;