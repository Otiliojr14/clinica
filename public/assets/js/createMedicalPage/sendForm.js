import {
    token,
    nurseIdInput,
    matriculaInput,
    beneficiariosSelect,
    sintomasRespiratoriosInput,
    pesoInput,
    tallaInput,
    circunferenciaInput,
    imcBoxText,
    arterialDiastolicaInput,
    arterialSistolicaInput,
    frecuenciaCardiacaInput,
    frecuenciaRespiratoriaInput,
    temperaturaInput,
    saturacionOxigenoInput,
    glucosaAyunoInput,
    tbSintomasInput,
    discapacidadInput,
    buttonSendForm,
} from "./selectors.js";

function sendForm(e) {
    e.preventDefault();
    buttonSendForm.value = "Espere...";
    const matricula = matriculaInput.value,
        beneficiario = beneficiariosSelect.value,
        sintomasRespiratorios = sintomasRespiratoriosInput.value,
        peso = pesoInput.value,
        talla = tallaInput.value,
        circunferencia = circunferenciaInput.value,
        arterialDiastolica = arterialDiastolicaInput.value,
        arterialSistolica = arterialSistolicaInput.value,
        frecuenciaCardiaca = frecuenciaCardiacaInput.value,
        frecuenciaRespiratoria = frecuenciaRespiratoriaInput.value,
        temperatura = temperaturaInput.value,
        saturacionOxigeno = saturacionOxigenoInput.value,
        glucosaAyuno = glucosaAyunoInput.value,
        tbSintomas = tbSintomasInput.value,
        discapacidad = discapacidadInput.value,
        nurseId = nurseIdInput.value;

    const xhr = new XMLHttpRequest();

    const data = new FormData();

    data.append("type", "insertarHistorial");
    data.append("nurse_id", nurseId);
    data.append("matricula", matricula);
    data.append("no_beneficiario", beneficiario);
    data.append("sintomas_respiratorios", sintomasRespiratorios);
    data.append("peso", peso);
    data.append("talla", talla);
    data.append("circunferencia", circunferencia);
    data.append("arterial_diastolica", arterialDiastolica);
    data.append("arterial_sistolica", arterialSistolica);
    data.append("frecuencia_cardiaca", frecuenciaCardiaca);
    data.append("frecuencia_respiratoria", frecuenciaRespiratoria);
    data.append("temperatura", temperatura);
    data.append("saturacion_oxigeno", saturacionOxigeno);
    data.append("glucosa_ayuno", glucosaAyuno);
    data.append("tb_sintomas", tbSintomas);
    data.append("imc", imcBoxText.textContent);
    data.append("discapacidad", discapacidad);

    xhr.open("POST", `/medical_history?_token=${token.value}`, true);

    xhr.onload = function () {
        if (this.status === 200) {
            const response = JSON.parse(xhr.responseText);

            if (response.status === "correct") {
                buttonSendForm.value = "Ingresar";
                swal({
                    type: "success",
                    title: `Datos agregados`,
                    text: `${response.text}`,
                }).then((resultado) => {
                    if (resultado.value) {
                        window.location.href = "/medical_history/create";
                    }
                });
            } else {
                swal({
                    type: "error",
                    title: `Error!`,
                    text: `Hubo un error, intente de nuevo más tarde`,
                });
            }
        }
    };

    xhr.send(data);
}

export default sendForm;
