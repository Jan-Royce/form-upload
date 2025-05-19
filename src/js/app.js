import * as Theme from "./modules/theme";
import * as Upload from "./modules/upload";

export function init(version) {
    Theme.detect();
    Upload.init();
    
    console.log('✅ App initialized (v' + version + ')');
}

window.App = {
    init,
    Theme
}