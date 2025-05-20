import * as Theme from "./modules/theme";
import * as Upload from "./modules/upload";

export function init(version, uploadUrl) {
    Theme.detect();
    Upload.init(uploadUrl);
    
    console.log('✅ App initialized (v' + version + ')');
}

window.App = {
    init,
    Theme
}