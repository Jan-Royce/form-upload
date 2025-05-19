export function init() {
    clearInputMessages();
    
    window.Dropzone.autoDiscover = false;
    
    let dropzone = new window.Dropzone("div#image-upload", {
        url: "/upload",
        autoQueue: false,
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 1,
        uploadMultiple: false,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        init: function() {
            this.on("sending", function (file, xhr, formData) {
                //TODO loading
                formData.append("name", document.querySelector("#file-name").value);
                formData.append("visibility", document.querySelector("#select-visibility").value);
            });
            
            this.on("success", function (file, responseText, e) {
                if (file.xhr.status === 200) {
                    document.querySelector(".input-message[for='submit']").classList.add("success");
                    document.querySelector(".input-message[for='submit']").innerHTML = "Uploaded successfully!";
                    
                    // TODO reset form
                }
            });
            
            this.on("error", function (file, response) {
                let err = response.error;
                if (err) document.querySelector(".input-message[for='submit']").innerHTML = err.error;
            });

            this.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
            });
        }
    });
    
    document.querySelector("#upload-file").addEventListener("click", function(e) {
        e.preventDefault();
        
        let errors = validateFields(dropzone);
        
        clearInputMessages();
        
        if(errors.length > 0) {
            showErrors(errors);
        } else {
            uploadFile(dropzone);
        }
    });
}

function clearInputMessages()
{
    document.querySelectorAll(".input-message").forEach(function (el) {
        el.innerHTML = "";
    });
}

function validateFields(dropzone)
{
    let errors = [];
    
    if(document.querySelector("#file-name").value == "") {
        errors.push({
            id: "file-name",
            message: "File name must not be empty."
        });
    }
    
    if(document.querySelector("#select-visibility").value == "") {
        errors.push({
            id: "select-visibility",
            message: "File visibility must be set."
        });
    }
    
    let files = dropzone.files;
    
    if(files.length == 0) {
        errors.push({
            id: "file",
            message: "Image upload is required."
        });
    } else if(files.length > 1) {
        errors.push({
            id: "file",
            message: "Only one (1) image is allowed per upload."
        });
    }
    
    return errors;
}

function showErrors(errors)
{
    for(let i=0; i<errors.length; i++) {
        document.querySelector(`.input-message[for="${errors[i].id}"]`).innerHTML = errors[i].message;
    }
}

function uploadFile(dropzone)
{
    dropzone.enqueueFiles(dropzone.files)
    dropzone.processQueue();
}