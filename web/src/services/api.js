import axios from 'axios'

class ApiService {
    constructor() {        
        axios.defaults.baseURL = process.env.VUE_APP_API_URL
        axios.defaults.headers = { Accept: 'application/json' }
    }

    get(resource, requestConfig = null) {
        return axios.get(resource, requestConfig)
    }

    post(resource, payload) {
        return axios.post(`${resource}`, payload)
    }
}

export default new ApiService()
