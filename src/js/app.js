import * as Theme from "./modules/theme";

export function init(version) {
    Theme.detect();

    let selectLocale = document.getElementById('select-locale');

    selectLocale.addEventListener("change", () => {

        let locale = selectLocale.value;

        if (locale !== '') {
            window.location.href = '?locale=' + locale;
        }

    });


    console.log('✅ App initialized (v' + version + ')');
}

window.App = {
    init,
    Theme
}