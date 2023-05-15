import router from "./router/index"
import axios from "axios";
const api = axios.create({baseURL: 'http://127.0.0.1:8000/api/'});

api.interceptors.request.use(config => {

    if (localStorage.getItem('access_token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`

    }

    return config
},error => {
})

api.interceptors.response.use(config => {

    if (localStorage.getItem('access_token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
    }

    return config
},error => {
    if (error.response.status === 401) {
       router.push({name: 'login'})
    }
})

export default api

