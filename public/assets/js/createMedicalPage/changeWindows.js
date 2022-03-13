import { articlesFormCreate, labelsArticleCreate } from "./selectors.js";

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

export default changeWindow;
