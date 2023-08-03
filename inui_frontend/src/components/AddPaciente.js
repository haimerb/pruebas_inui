import React, { useState } from "react";


import PacienteDataService from "../services/PacienteService";

const AddPaciente = () => {
  const initialPacienteState = {
    id: null,
    tipo_id: "",
    nombre: "",
    apellido: "",
    telefono: "",
    email: "",
    genero: ""
  };
  const [paciente, setPaciente] = useState(initialPacienteState);
  const [submitted, setSubmitted] = useState(false);

  const handleInputChange = event => {
    const { name, value } = event.target;
    setPaciente({ ...paciente, [name]: value });
  };

  const savePaciente = () => {
    var data = {
      id: paciente.id,
      tipo_id: paciente.tipo_id,
      nombre: paciente.nombre,
      apellido: paciente.apellido,
      telefono: paciente.telefono,
      email: paciente.email,
      genero: paciente.genero
    };

    PacienteDataService.create(data)
      .then(response => {
        setPaciente({

          id: response.data.id,
          tipo_id: response.data.tipo_id,
          nombre: response.data.nombre,
          apellido: response.data.apellido,
          telefono: response.data.telefono,
          email: response.data.email,
          genero: response.data.genero
        });
        setSubmitted(true);
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };

  const newPaciente = () => {
    setPaciente(initialPacienteState);
    setSubmitted(false);
  };

  return (
    <div className="submit-form">
      {submitted ? (
        <div>
          <h4>Se envio correctamente!</h4>
          <button className="btn btn-success" onClick={newPaciente}>
            Volver
          </button>
        </div>
      ) : (
        <div>


          <div className="form-group">
            <label htmlFor="id">Id</label>
            <input
              type="text"
              className="form-control"
              id="id"
              required
              value={paciente.id}
              onChange={handleInputChange}
              name="id"
            />
          </div>

          <div className="form-group">
            <label htmlFor="tipo_id">Tipo Id</label>
            <input
              type="text"
              className="form-control"
              id="tipo_id"
              required
              value={paciente.tipo_id}
              onChange={handleInputChange}
              name="tipo_id"
            />
          </div>

          <div className="form-group">
            <label htmlFor="nombre">Nombre</label>
            <input
              type="text"
              className="form-control"
              id="nombre"
              required
              value={paciente.nombre}
              onChange={handleInputChange}
              name="nombre"
            />
          </div>

          <div className="form-group">
            <label htmlFor="apellido">Apellido</label>
            <input
              type="text"
              className="form-control"
              id="apellido"
              required
              value={paciente.apellido}
              onChange={handleInputChange}
              name="apellido"
            />
          </div>

          <div className="form-group">
            <label htmlFor="telefono">Telefono</label>
            <input
              type="text"
              className="form-control"
              id="telefono"
              required
              value={paciente.telefono}
              onChange={handleInputChange}
              name="telefono"
            />
          </div>

          <div className="form-group">
            <label htmlFor="email">Email</label>
            <input
              type="text"
              className="form-control"
              id="email"
              required
              value={paciente.email}
              onChange={handleInputChange}
              name="email"
            />
          </div>

          <div className="form-group">
            <label htmlFor="genero">Genero</label>
            <input
              type="text"
              className="form-control"
              id="genero"
              required
              value={paciente.genero}
              onChange={handleInputChange}
              name="genero"
            />
          </div>

          

          <button onClick={savePaciente} className="btn btn-success">
            Enviar
          </button>
        </div>
      )}
    </div>
  );
};

export default AddPaciente;
