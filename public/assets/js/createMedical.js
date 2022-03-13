import {
    buttonsFormCreate,
    matriculaInput,
    beneficiariosSelect,
    formCreateMedical,
    tallaInput,
    circunferenciaInput,
    temperaturaInput,
    discapacidadInput,
} from "./createMedicalPage/selectors.js";
import changeWindow from "./createMedicalPage/changeWindows.js";
import getBeneficiarios from "./createMedicalPage/getBeneficiarios.js";
import searchPerson from "./createMedicalPage/searchPerson.js";
import {
    verifyWindowFisico,
    verifyWindowSalud,
    verifyWindowRegister,
} from "./createMedicalPage/inputVerificationWindow.js";
import calculateIMC from "./createMedicalPage/calculateIMC.js";
import sendForm from "./createMedicalPage/sendForm.js";

window.onload = () => {
    buttonsFormCreate.forEach((button) => {
        button.addEventListener("click", changeWindow);
    });
    matriculaInput.addEventListener("blur", getBeneficiarios);
    beneficiariosSelect.addEventListener("blur", searchPerson);

    // Evitar cambiar de ventanas sin datos ingresados
    tallaInput.addEventListener("blur", calculateIMC);
    circunferenciaInput.addEventListener("blur", verifyWindowFisico);
    temperaturaInput.addEventListener("blur", verifyWindowSalud);
    discapacidadInput.addEventListener("blur", verifyWindowRegister);

    formCreateMedical.addEventListener("submit", sendForm);
};
