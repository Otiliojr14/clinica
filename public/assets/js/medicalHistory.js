import { controlOptions } from "./medicalHistoryScripts/selectors.js";
import changeWindowOption from "./medicalHistoryScripts/changeWindowOption.js";

window.onload = () => {
    controlOptions.forEach((option) => {
        option.addEventListener("click", changeWindowOption);
    });
};
