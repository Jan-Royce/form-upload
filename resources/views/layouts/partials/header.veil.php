<?php

use Bayfront\BonesService\WebApp\Utilities\VeilData;

/*
 * Partial: Header
 *
 * Places:
 *
 *   - None
 *
 * Uses:
 *
 *   - None
 *
 * Data:
 *
 *   - webapp.locale.all
 *   - webapp.locale.current
 *   - webapp.public.brand.logo
 *   - webapp.public.brand.name
 *
 */
?>
<header class="container xl:max-w-screen-xl mx-auto py-4 flex flex-row justify-between items-center h-full">

    <div>
        <a href="@route:home" title="{{webapp.public.brand.name}}">
            <img class="h-[40px]" src="{{webapp.public.brand.logo}}"
                 alt="{{webapp.public.brand.name}}"/>
        </a>
    </div>
    
</header>