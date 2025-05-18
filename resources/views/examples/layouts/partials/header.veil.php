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

    <div>

        <div class="flex gap-2 items-center">

            <label>
                <select id="select-locale"
                        class="form-select rounded-lg px-4 py-3 w-52 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:ring-blue-500 focus:border-blue-500">

                    <?php
                    foreach (VeilData::get('webapp.locale.valid', []) as $locale) {

                        $class = '';
                        $selected = '';
                        $current_locale = VeilData::get('webapp.locale.current', '');

                        if ($current_locale == $locale) {
                            $class = ' text-blue-500';
                            $selected = ' selected';
                        }

                        echo '<option value="' . $locale . '" ' . $selected . '>@say:common.locale.' . $locale . '</option>';
                    }
                    ?>

                </select>
            </label>

            <div>
                <button class="hidden dark:inline-flex w-10 h-10 justify-center items-center rounded-full cursor-pointer hover:bg-gray-800"
                        data-theme-toggle="light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6 text-yellow-300">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path>
                    </svg>
                </button>

                <button class="inline-flex dark:hidden w-10 h-10 justify-center items-center rounded-full cursor-pointer hover:bg-gray-200"
                        data-theme-toggle="dark">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"></path>
                    </svg>
                </button>
            </div>

        </div>

    </div>

</header>