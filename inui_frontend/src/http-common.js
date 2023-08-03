import axios from "axios";

export default axios.create({
  baseURL: "http://localhost/inui/api/api.php",
  headers: {
    "Content-type": "application/json"
  }
  
});
