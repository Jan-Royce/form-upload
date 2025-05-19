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

<div id="loading-overlay" class="absolute w-full h-full bg-black text-white rounded opacity-60 top-0 left-0 z-20 pt-48 hidden">
    <span class="text-xl">Uploading, please wait...</span>
    <div role="status" class="pt-4">
        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
</div>

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