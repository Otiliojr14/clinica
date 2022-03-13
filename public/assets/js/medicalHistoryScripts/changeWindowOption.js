import { displayOptions, controlOptions } from "./selectors.js";

function changeWindowOption() {
    const controlOptionClass = this.classList[1];

    displayOptions.forEach((option) => {
        option.style.display = "none";

        if (option.classList.contains(controlOptionClass)) {
            option.style.display = "block";
        }
    });

    controlOptions.forEach((option) => {
        option.classList.remove("active");
    });

    this.classList.add("active");
}

export default changeWindowOption;
