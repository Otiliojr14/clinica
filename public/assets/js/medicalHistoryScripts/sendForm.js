import {
    diagnosticoInput,
    enfermedadCronicaInput,
    consultaIntegralInput,
    resistenciaInsulinaInput,
    nutricionInput,
    actFisicaInput,
    psicologiaInput,
    ultimosLabInput,
    medicinaInternaInput,
    specialtyIdInput,
    ninoSanoInput,
    adultoMayorInput,
    trimestreInput,
    consultaPrenatalInput,
    riesgoInput,
    fechaInput,
    labsInput,
    estudiosInput,
    token,
    idDoctorInput,
    idMedicalHistoryInput,
} from "./selectors.js";

function sendForm(e) {
    e.preventDefault();

    const xhr = new XMLHttpRequest();

    const data = new FormData();

    data.append("diagnostico", diagnosticoInput.value);
    data.append("enfermedad_cronica", enfermedadCronicaInput.value);
    data.append("consulta_integral", consultaIntegralInput.value);
    data.append("resistencia_insulina", resistenciaInsulinaInput.value);
    data.append("nutricion", nutricionInput.value);
    data.append("act_fisica", actFisicaInput.value);
    data.append("psicologia", psicologiaInput.value);
    data.append("ultimos_lab", ultimosLabInput.value);
    data.append("medicina_interna", medicinaInternaInput.value);
    data.append("specialty_id", specialtyIdInput.value);
    data.append("nino_sano", ninoSanoInput.value);
    data.append("adulto_mayor", adultoMayorInput.value);
    data.append("specialty_id", specialtyIdInput.value);
    data.append("trimestre", trimestreInput.value);
    data.append("specialty_id", specialtyIdInput.value);
    data.append("consulta_prenatal", consultaPrenatalInput.value);
    data.append("riesgo", riesgoInput.value);
    data.append("fecha", fechaInput.value);
    data.append("labs", labsInput.value);
    data.append("estudios", estudiosInput.value);
    data.append("cl_personal_id_medical", idDoctorInput.value);
    data.append("_method", "PATCH");

    xhr.open(
        "POST",
        `/medical_history/${idMedicalHistoryInput.value}?_token=${token.value}`,
        true
    );

    xhr.onload = function () {
        if (this.status === 200) {
            const response = xhr.responseText;

            console.log(response);
        }
    };

    xhr.send(data);
}

export default sendForm;
