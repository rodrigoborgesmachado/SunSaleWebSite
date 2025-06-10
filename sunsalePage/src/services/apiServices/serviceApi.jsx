import axios from "axios";
import { API } from "../../config/constants";

const apiUrl = API;

const api = axios.create({
  baseURL: apiUrl,
  headers: {
    "Content-Type": "application/json",
  },
});

export default api;