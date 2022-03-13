import { pesoInput, tallaInput, imcBoxText } from "./selectors.js";

function calculateIMC() {
    const peso = pesoInput.value,
        talla = tallaInput.value / 100;

    let IMC = peso / talla ** 2;

    IMC = IMC.toFixed(2);

    imcBoxText.textContent = IMC;

    imcBoxText.parentNode.style.display = "flex";

    console.log(imcBoxText.textContent);
}

export default calculateIMC;
