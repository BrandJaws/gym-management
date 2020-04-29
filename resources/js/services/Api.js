import axios from "axios";
export default () => {
    const instance = axios.create({
        baseURL: "http://127.0.0.1:8000/customer",
        withCredentials: false,
        headers: {
            Accept: "application/json",

            "Content-Type": "application/json"
        }
    });
    // before a request is made start the nprogress
    instance.interceptors.request.use(config => {
        return config;
    });
    // before a response is returned stop nprogress
    instance.interceptors.response.use(response => {
        return response;
    });

    return instance;
};
