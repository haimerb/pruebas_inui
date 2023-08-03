import React from "react";
import { Routes, Route, Link } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";
import "./App.css";

import AddPaciente from "./components/AddPaciente";
import Paciente from "./components/Paciente";
import PacientesList from "./components/PacientesList";

function App() {
  return (
    <div>
      <nav className="navbar navbar-expand navbar-dark bg-dark">
        <a href="/pacientes" className="navbar-brand">
          INUI
        </a>
        <div className="navbar-nav mr-auto">
          <li className="nav-item">
            <Link to={"/pacientes"} className="nav-link">
              Pacientes
            </Link>
          </li>
          <li className="nav-item">
            <Link to={"/add"} className="nav-link">
              Agregar
            </Link>
          </li>
        </div>
      </nav>

      <div className="container mt-3">
        <Routes>
          <Route path="/" element={<PacientesList/>} />
          <Route path="/pacientes" element={<PacientesList/>} />
          <Route path="/add" element={<AddPaciente/>} />
          <Route path="/pacientes/:id" element={<Paciente/>} />
        </Routes>
      </div>
    </div>
  );
}

export default App;
