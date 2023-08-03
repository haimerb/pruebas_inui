import http from "../http-common";

const getAll = () => {
  return http.get("/pacientes");
};

const get = id => {
  return http.get(`/pacienteby?id=${id}`);
};

const create = data => {
  return http.post(`/crearpaciente?id=${data.id}&tipo_id=${data.tipo_id}&nombre=${data.nombre}&apellido=${data.apellido}&telefono=${data.telefono}&email=${data.email}&genero=${data.genero}`);  
};

const update = (id, data) => {
  return http.post(`/editarpaciente?id=${data.id}&tipo_id=${data.tipo_id}&nombre=${data.nombre}&apellido=${data.apellido}&telefono=${data.telefono}&email=${data.email}&genero=${data.genero}`);
};

const remove = id => {
  return http.post(`/eliminarpacienteby?id=${id}`);
};

const removeAll = () => {
  return http.delete(`/eliminartodopacientes`);
};

const findByName = title => {
  return http.get(`/pacientes?title=${title}`);
};



const PacienteService = {
  getAll,
  get,
  create,
  update,
  remove,
  removeAll,
  findByName
};

export default PacienteService;
