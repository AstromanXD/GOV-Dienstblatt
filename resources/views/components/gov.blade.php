@php
$name = "Luis Rakete";
$email = "luis.Vanbruck@gov.de";
$image = "https://i.imgur.com/VhCbB4S.jpeg";
$user = new \App\Models\User();
$user->name=$name;
$user->email=$email;
$user->image=$image;
@endphp

<x-app>
    <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-menu activate-by-route>

            {{-- User --}}

                <x-menu-separator />

                    <x-list-item :item="$user" sub-value="email" sub-value  no-separator no-hover class="-mx-2 !-my-2 rounded">


                        <x-slot:actions>
                            <x-button icon="o-power" class="btn-circle btn-ghost btn-xs join-item" tooltip-left="logoff" no-wire-navigate link="/logout" />
                        </x-slot:actions>
                    </x-list-item>



                <x-menu-separator />


                <x-menu-item title="Dashboard" icon="o-Sparkles" link="/dashboard" />
                <x-menu-item title="Dokumente" icon="o-sparkles" link="/documents" />
                <x-menu-item title="Namensänderung" icon="o-sparkles" link="/namechange" />
                <x-menu-item title="Fahrzeugwartung" icon="" link="####" />
                <x-menu-item title="Standesamt" icon="" link="registry_office" />
                <x-menu-item  title="Kalender" icon="" link="/calender" />
                <x-menu-item  title="Sicherheit" icon="" link="####" />
                <x-menu-sub title="Immobilien" icon="o-Home">
                    <x-menu-item title="Grundbuch" icon="o-book-open" link="####" />
                    <x-menu-item title="Hauskarte" icon="o-map" link="####" />
                    <x-menu-item title="Sozialwohnungen" icon="" link="####" />
                    <x-menu-item title="Auktionsschlüssel" icon="o-key" link="####"/>
                    <x-menu-item title="Auktionen" icon="o-key" link="####"/>
                </x-menu-sub>
                <x-menu-sub title="Verwaltung" icon="o-cog-6-tooth">
                    <x-menu-item title="Personal" icon="o-user" link="####" />
                    <x-menu-item title="Fahrzeuge" icon="o-truck" link="####"/>
                </x-menu-sub>
                <x-menu vertical class="btm-nav">
                    <x-menu-item icon="o-power"/>
                    <x-menu-item icon="o-power"/>
                </x-menu>
            </x-menu>

        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
    </body>
</x-app>
