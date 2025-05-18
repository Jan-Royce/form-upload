<?php

use Bayfront\BonesService\WebApp\Utilities\VeilData;

/*
 * Page: 404
 *
 * Places:
 *
 *  - None
 *
 * Uses:
 *
 *   - examples/layouts/container
 *
 * Data:
 *
 *   - app.version
 *   - bones.version
 *   - page.title
 *
 */
?>
@section:content

<h1 class="text-3xl font-semibold mb-6">{{page.title}} (404)</h1>

<div class="mx-auto w-48 my-4">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-full text-red-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
    </svg>
</div>

<p class="mb-6">@say:common.page_not_found</p>

<p class="mb-6 text-xl font-semibold">Details:</p>

<div class="inline-block mx-auto my-4">
    <ul class="mx-auto text-left">
        <li>Message: <code class="text-red-500"><?php echo VeilData::get('exception.error.message'); ?></code></li>
        <li>Type: <code class="text-red-500"><?php echo VeilData::get('exception.error.type'); ?></code></li>
        <li>Status: <code class="text-red-500"><?php echo VeilData::get('exception.error.status'); ?></code></li>
    </ul>
</div>

<p class="mb-6">Bones v{{bones.version}} | App v{{app.version}}</p>

@endsection

@use:examples/layouts/container