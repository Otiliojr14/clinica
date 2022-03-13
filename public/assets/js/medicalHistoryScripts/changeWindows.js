import { articlesFormEdit, labelsArticleEdit } from "./selectors.js";

function changeWindow() {
    const windowName = this.value;

    articlesFormEdit.forEach((article) => {
        article.style.display = "none";

        if (article.classList.contains(windowName)) {
            article.style.display = "unset";
        }
    });

    labelsArticleEdit.forEach((label) => {
        label.classList.remove("activeLabel");

        if (label.classList.contains(windowName)) {
            label.classList.add("activeLabel");
        }
    });
}

export default changeWindow;
