import React, { useState, useEffect } from "react";
import { useParams, useNavigate } from 'react-router-dom';
import PacienteDataService from "../services/PacienteService";

const Paciente = props => {
  const { id }= useParams();
  let navigate = useNavigate();

  const initialPacienteState = {
    id: null,
    tipo_id: "",
    nombre: "",
    apellido: "",
    telefono: "",
    email: "",
    genero: ""
  };

  
const [currentPaciente, setCurrentPaciente] = useState(initialPacienteState);
  const [message, setMessage] = useState("");

  const getPaciente = id => {
    PacienteDataService.get(id)
      .then(response => {
        setCurrentPaciente(response.data);
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };

  useEffect(() => {
    if (id)
      getPaciente(id);
  }, [id]);

  const handleInputChange = event => {
    const { name, value } = event.target;
    setCurrentPaciente({ ...currentPaciente, [name]: value });
  };

  const updatePublished = status => {
    var data = {
      id: currentPaciente.id,
      tipo_id:currentPaciente.tipo_id,
      nombre:currentPaciente.nombre,
      apellido:currentPaciente.apellido,
      telefono:currentPaciente.telefono,
      email:currentPaciente.email,
      genero:currentPaciente.genero
    };

    PacienteDataService.update(currentPaciente.id, data)
      .then(response => {
        setCurrentPaciente({ ...currentPaciente, published: status });
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };

  const updatePaciente = () => {
    PacienteDataService.update(currentPaciente.id, currentPaciente)
      .then(response => {
        console.log(response.data);
        setMessage("Paciente actualizado correctamente!");
      })
      .catch(e => {
        console.log(e);
      });
  };

  const deletePaciente = () => {
    PacienteDataService.remove(currentPaciente.id)
      .then(response => {
        console.log(response);
        console.log(response.data);
        navigate("/pacientes");
      })
      .catch(e => {
        console.log(e);
      });
  };

  return (
    <div>
      {currentPaciente ? (

        <div className="edit-form">

          <h4>Paciente</h4>

          <form>

          <div className="form-group">
              <label htmlFor="id">Id</label>
              <input
                type="text"
                className="form-control"
                id="id"
                name="id"
                value={currentPaciente.id}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="tipo_id">Tipo ID</label>
              <input
                type="text"
                className="form-control"
                id="tipo_id"
                name="tipo_id"
                value={currentPaciente.tipo_id}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="nombre">Nombre</label>
              <input
                type="text"
                className="form-control"
                id="nombre"
                name="nombre"
                value={currentPaciente.nombre}
                onChange={handleInputChange}
              />
            </div>



            <div className="form-group">
              <label htmlFor="apellido">Apellido</label>
              <input
                type="text"
                className="form-control"
                id="apellido"
                name="apellido"
                value={currentPaciente.apellido}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="telefono">Telefono</label>
              <input
                type="text"
                className="form-control"
                id="telefono"
                name="telefono"
                value={currentPaciente.telefono}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="email">Email</label>
              <input
                type="text"
                className="form-control"
                id="email"
                name="email"
                value={currentPaciente.email}
                onChange={handleInputChange}
              />
            </div>

            <div className="form-group">
              <label htmlFor="genero">Genero</label>
              <input
                type="text"
                className="form-control"
                id="genero"
                name="genero"
                value={currentPaciente.genero}
                onChange={handleInputChange}
              />
            </div>

            

          </form>

          {currentPaciente.published ? (
            <button
              className="badge badge-primary mr-2"
              onClick={() => updatePublished(false)}
            >
              UnPublish
            </button>
          ) : (
            <button
              className="badge badge-primary mr-2"
              onClick={() => updatePublished(true)}
            >
              Publish
            </button>
          )}

          <button className="badge badge-danger mr-2" onClick={deletePaciente}>
            Eliminar
          </button>

          <button
            type="submit"
            className="badge badge-success"
            onClick={updatePaciente}
          >
            Actualizar
          </button>
          <p>{message}</p>
        </div>
      ) : (
        <div>
          <br />
          <p>Por favor hacga click en un Paciente...</p>
        </div>
      )}
    </div>
  );
};

export default Paciente;
