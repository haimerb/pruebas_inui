import React, { useState, useEffect } from "react";
import PacienteDataService from "../services/PacienteService";
import { Link } from "react-router-dom";

const PacientesList = () => {
  const [pacientes, setPacientes] = useState([]);
  const [currentPaciente, setCurrentPaciente] = useState(null);
  const [currentIndex, setCurrentIndex] = useState(-1);
  const [searchName, setSearchName] = useState("");

  useEffect(() => {
    retrievePacientes();
  }, []);

    /**
   * Lo retire porque no lo pude terminar.
   * funcinaba mal 
   */
  const onChangeSearchName = e => {
    const searchTitle = e.target.value;
    setSearchName(searchTitle);
  };

  const retrievePacientes = () => {
    PacienteDataService.getAll()
      .then(response => {
        //console.log(response.data);
        setPacientes(  response.data);
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };

  const refreshList = () => {
    retrievePacientes();
    setCurrentPaciente(null);
    setCurrentIndex(-1);
  };

  const setActivePaciente = (paciente, index) => {
    setCurrentPaciente(paciente);
    setCurrentIndex(index);
  };

  const removeAllPacientes = () => {
    PacienteDataService.removeAll()
      .then(response => {
        console.log(response.data);
        refreshList();
      })
      .catch(e => {
        console.log(e);
      });
  };

  /**
   * Lo retire porque no lo pude terminar.
   * funcinaba mal 
   */
  const findByName = () => {
    PacienteDataService.findByName(searchName)
      .then(response => {
        setPacientes(response.data);
        console.log(response.data);
      })
      .catch(e => {
        console.log(e);
      });
  };



  return (
    <div className="list row">

      
      
      <div className="col-md-6">
        <h4>Lista de Pacientes</h4>

        <ul className="list-group">
          {pacientes &&
            pacientes.map((paciente, index) => (
              <li
                className={
                  "list-group-item " + (index === currentIndex ? "active" : "")
                }
                onClick={() => setActivePaciente(paciente, index)}
                key={index}
              >
                {"ID: "+paciente.id+" "+ paciente.nombre}
              </li>
            ))}
        </ul>

        <button
          className="m-3 btn btn-sm btn-danger"
          onClick={removeAllPacientes}
        >
          Remover todo
        </button>
      </div>
      <div className="col-md-6">
        {currentPaciente ? (

          <div>

            <h4>Paciente</h4>

            <div>
              <label>
                <strong>Id:</strong>
              </label>{" "}
              {currentPaciente.id}
            </div>

            <div>
              <label>
                <strong>Tipo ID:</strong>
              </label>{" "}
              {currentPaciente.tipo_id}
            </div>

            <div>
              <label>
                <strong>Nombre:</strong>
              </label>{" "}
              {currentPaciente.nombre}
            </div>

            <div>
              <label>
                <strong>Apellido:</strong>
              </label>{" "}
              {currentPaciente.apellido}
            </div>

            <div>
              <label>
                <strong>Apellido:</strong>
              </label>{" "}
              {currentPaciente.apellido}
            </div>

            <div>
              <label>
                <strong>Telefono:</strong>
              </label>{" "}
              {currentPaciente.telefono}
            </div>

            <div>
              <label>
                <strong>Email:</strong>
              </label>{" "}
              {currentPaciente.email}
            </div>

            <div>
              <label>
                <strong>Genero:</strong>
              </label>{" "}
              {currentPaciente.genero}
            </div>

            

            <Link
              to={"/pacientes/" + currentPaciente.id}
              className="badge badge-warning"
            >
              Editar
            </Link>
          </div>
        ) : (
          <div>
            <br />
            <p> Por favor de click en un Paciente ...</p>
          </div>
        )}
      </div>
    </div>
  );
};

export default PacientesList;
