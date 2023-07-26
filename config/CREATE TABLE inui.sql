CREATE TABLE inui.paciente (
	id varchar NULL,
	tipo_id varchar NULL,
	nombre varchar NULL,
	apellido varchar NULL,
	telefono varchar NULL,
	email varchar NULL,
	genero varchar NULL
);


ALTER TABLE inui.paciente ADD id BIGSERIAL PRIMARY KEY;