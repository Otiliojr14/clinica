import {
    buttonsFormCreate,
    articlesFormCreate,
    labelsArticleCreate,
} from "./selectors.js";

console.log(labelsArticleCreate);

window.onload = () => {
    buttonsFormCreate.forEach((button) => {
        button.addEventListener("click", changeWindow);
    });
};

function changeWindow() {
    const windowName = this.value;

    articlesFormCreate.forEach((article) => {
        article.style.display = "none";

        if (article.classList.contains(windowName)) {
            article.style.display = "unset";
        }
    });

    labelsArticleCreate.forEach((label) => {
        label.classList.remove("activeLabel");

        if (label.classList.contains(windowName)) {
            label.classList.add("activeLabel");
        }
    });
}
