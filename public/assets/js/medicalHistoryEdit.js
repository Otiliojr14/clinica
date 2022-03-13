import {
    buttonsFormEdit,
    formEditMedical,
} from "./medicalHistoryScripts/selectors.js";
import changeWindow from "./medicalHistoryScripts/changeWindows.js";
import sendForm from "./medicalHistoryScripts/sendForm.js";

window.onload = () => {
    buttonsFormEdit.forEach((button) => {
        button.addEventListener("click", changeWindow);
    });
    formEditMedical.addEventListener("submit", sendForm);
};
