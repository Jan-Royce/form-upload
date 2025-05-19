<?php
/*
 * Page: Home
 *
 * Places:
 *
 *  - None
 *
 * Uses:
 *
 *   - layouts/container
 *
 * Data:
 *
 *   - page.title
 *
 */
?>
@section:content

<h1 class="text-3xl text-left font-semibold mb-6 px-4">{{page.title}}</h1>

<form action="/upload" id="upload-form" class="text-left px-4" method="post" enctype="multipart/form-data">
    
    <div class="md:flex flex-wrap md:items-center mb-6">
        <div class="md:w-1/2 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2 required" for="file-name">File Name</label>
            </div>
            <div class="md:w-2/3 mr-16">
                <input class="shadow appearance-none dark:bg-gray-600 dark:text-white border border-gray-300 dark:border-gray-700 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="file-name"
                        name="name"
                        type="text"
                        placeholder="File Name"
                        autocomplete="off"
                        required>
            </div>
            <span class="text-sm text-red-500 input-message" for="file-name"></span>
        </div>
            
        <div class="md:w-1/2 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2 required" for="select-visibility">Visibility</label>
            </div>
            <div class="md:w-2/3">
                <select id="select-visibility"
                        class="form-select rounded-lg px-2 py-1 w-52 dark:bg-gray-600 dark:text-white border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:ring-blue-500 focus:border-blue-500"
                        name="visibility"
                        autocomplete="off"
                        required>
                    <option value="" disabled selected>-</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
            <span class="text-sm text-red-500 input-message" for="select-visibility"></span>
        </div>
        
        <div class="w-full mb-4">
            <div>
                <label class="block text-gray-700 dark:text-white text-sm font-bold mb-2 required" for="image-upload">File</label>
            </div>
            <div id="image-upload" class="dropzone rounded">
                <div class="dz-message">
                    <span class="font-semibold">Drop image here or click to upload</span>
                </div>
            </div>
            <span class="text-sm text-red-500 input-message" for="file"></span>
        </div>
        
        <div class="w-full text-center">
            <p class="text-sm text-red-500 input-message mb-4" for="submit"></p>    
        
            <button type="submit" 
                id="upload-file"
                class="text-white bg-[var(--color-primary)] hover:bg-[var(--color-primary-dark)] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Upload
            </button>
        </div>
    </div>
    
</form>

@endsection

@use:layouts/container